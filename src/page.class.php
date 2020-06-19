<?php

class Page {
    private $total;                            //数据表中总记录数
    private $listRows;                         //每页显示行数
    private $limit;                            //SQL语句使用limit从句,限制获取记录个数
    private $uri;                              //自动获取url的请求地址
    private $pageNum;                          //总页数
    private $page;                            //当前页
    private $config = array(
        'head' => "条记录",
        'prev' => "上一页",
        'next' => "下一页",
        'first'=> "首页",
        'last' => "末页"
    );
    private $listNum = 10;                     //默认分页列表显示的个数


    //构造方法，设置分页类的属性
    public function __construct($total, $listRows=25, $query="", $ord=true){
        $this->total = $total;       //总记录数
        $this->listRows = $listRows;
        $this->uri = $this->getUri($query);
        $this->pageNum = ceil($this->total / $this->listRows);//总页数

        if(!empty($_GET["page"])) {
            $page = $_GET["page"];
        }else{
            if($ord)
                $page = 1;
            else
                $page = $this->pageNum;
        }

        if($total > 0) {
            if(preg_match('/\D/', $page) ){  //匹配数字（0-9）
                $this->page = 1;
            }else{
                $this->page = $page;
            }
        }else{
            $this->page = 0;
        }

        $this->limit = "LIMIT ".$this->setLimit();
    }




    function __get($args){
        if($args == "limit" || $args == "page")
            return $this->$args;
        else
            return null;
    }


    //按指定的格式输出分页
    function fpage(){
        $arr = func_get_args();

        $html[0] = " 共<b> {$this->total} </b>{$this->config["head"]} ";
        $html[1] = " 本页 <b>".$this->disnum()."</b> 条 ";
        $html[2] = " 本页从 <b>{$this->start()}-{$this->end()}</b> 条 ";
        $html[3] = " <b>{$this->page}/{$this->pageNum}</b>页 ";
        $html[4] = $this->firstprev();
        $html[5] = $this->pageList();
        $html[6] = $this->nextlast();
        $html[7] = $this->goPage();

        $fpage = '<div style="font:12px \'\5B8B\4F53\',san-serif;">';
        if(count($arr) < 1)
            $arr = array(0, 1,2,3,4,5,6,7);

        for($i = 0; $i < count($arr); $i++)
            $fpage .= $html[$arr[$i]];

        $fpage .= '</div>';
        return $fpage;
    }


    private function setLimit(){
        if($this->page > 0)
            return ($this->page-1)*$this->listRows.", {$this->listRows}";
        else
            return 0;
    }


    private function getUri($query){
        $request_uri = $_SERVER["REQUEST_URI"];
        $url = strstr($request_uri,'?') ? $request_uri :  $request_uri.'?';

        if(is_array($query))
            $url .= http_build_query($query);
        else if($query != "")
            $url .= "&".trim($query, "?&");

        $arr = parse_url($url);

        if(isset($arr["query"])){
            parse_str($arr["query"], $arrs);
            unset($arrs["page"]);
            $url = $arr["path"].'?'.http_build_query($arrs);
        }

        if(strstr($url, '?')) {
            if(substr($url, -1)!='?')
                $url = $url.'&';
        }else{
            $url = $url.'?';
        }

        return $url;
    }


    private function start(){
        if($this->total == 0)
            return 0;
        else
            return ($this->page-1) * $this->listRows+1;
    }


    private function end(){
        return min($this->page * $this->listRows, $this->total);
    }


    private function firstprev(){
        if($this->page > 1) {
            $str = " <a href='{$this->uri}page=1'>{$this->config["first"]}</a> ";
            $str .= "<a href='{$this->uri}page=".($this->page-1)."'>{$this->config["prev"]}</a> ";
            return $str;
        }

    }


    private function pageList(){
        $linkPage = " <b>";

        $inum = floor($this->listNum/2);
        /*当前页前面的列表 */
        for($i = $inum; $i >= 1; $i--){
            $page = $this->page-$i;

            if($page >= 1)
                $linkPage .= "<a href='{$this->uri}page={$page}'>{$page}</a> ";
        }
        /*当前页的信息 */
        if($this->pageNum > 1)
            $linkPage .= "<span style='padding:1px 2px;background:#BBB;color:white'>{$this->page}</span> ";

        /*当前页后面的列表 */
        for($i=1; $i <= $inum; $i++){
            $page = $this->page+$i;
            if($page <= $this->pageNum)
                $linkPage .= "<a href='{$this->uri}page={$page}'>{$page}</a> ";
            else
                break;
        }
        $linkPage .= '</b>';
        return $linkPage;
    }


    private function nextlast(){
        if($this->page != $this->pageNum) {
            $str = " <a href='{$this->uri}page=".($this->page+1)."'>{$this->config["next"]}</a> ";
            $str .= " <a href='{$this->uri}page=".($this->pageNum)."'>{$this->config["last"]}</a> ";
            return $str;
        }
    }


    private function goPage(){
        if($this->pageNum > 1) {
            return ' <input style="width:20px;height:17px !important;height:18px;border:1px solid #CCCCCC;" type="text" onkeydown="javascript:if(event.keyCode==13){var page=(this.value>'.$this->pageNum.')?'.$this->pageNum.':this.value;location=\''.$this->uri.'page=\'+page+\'\'}" value="'.$this->page.'"><input style="cursor:pointer;width:25px;height:18px;border:1px solid #CCCCCC;" type="button" value="GO" onclick="javascript:var page=(this.previousSibling.value>'.$this->pageNum.')?'.$this->pageNum.':this.previousSibling.value;location=\''.$this->uri.'page=\'+page+\'\'"> ';
        }
    }


    private function disnum(){
        if($this->total > 0){
            return $this->end()-$this->start()+1;
        }else{
            return 0;
        }
    }
}

?>



