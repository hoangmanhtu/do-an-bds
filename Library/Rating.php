<?php 
/**
 * Application Main Page That Will Serve All Requests
 *
 * @package PRO CODE CIP Framework
 * @author  Hiếu Nguyễn <dinhhieu@cipmedia.vn>
 * @version 1.0.0
 * @license http://cipmedia.vn
 */
class Rating {

	private $db;
	private $lang;
	public function __construct($db,$func)
    {  
    	$this->db = $db;
    	$this->func = $func;
    }
   
    public function html($com,$id){

    	$this->db->bindMore(array("id"=>$id,"com"=>$com));
		$row_star = $this->db->query("select * from #_review where id_product=:id and com=:com ");
		$tongsao = 0;
	    for($i=0;$i<count($row_star);$i++){
	        $tongsao = $tongsao + $row_star[$i]['star'];
	    }
	    if(count($row_star)>0){
	    	$num_star = round($tongsao/count($row_star),1);
	    } else {
	    	$num_star = 0;
	    }
	    if($num_star!=0){
	    	$defaut = $num_star;
	    } else {
	    	$defaut = 4;
	    }

	    $ip = $_SERVER['REMOTE_ADDR'];
		$this->db->bindMore(array("com"=>$com,"id_product"=>$id));
		$row = $this->db->row("select * from #_review where com=:com and id_product=:id_product and ip='".$ip."' ");
		if($row){
			$realonly = "readOnly: true,";
		}

    	$html = '
	    <div class="kkrating" data-com="'.$com.'" data-id="'.$id.'">
	    	<input id="rating-id" type="hidden" value="'.$id.'" />
	    	<input id="rating-com" type="hidden" value="'.$com.'" />
	    	<label>Dánh giá cho bài viết này</label>
	    	<div class="rateyo"></div>
	    	<div class="tb">Cám ơn bạn đã đánh giá</div>
	    	<div class="note">'.$num_star.' sao '.count($row_star).' đánh giá</div>
	    </div>';
	    $html .= '
    	<script>
	      $(function () {
	        $(".rateyo").rateYo({
		        rating: '.$defaut.','.$realonly.'
		        numStars: 5,
		        precision: 2,
		        fullStar: true,
		        minValue: 1,
		        maxValue: 5,
	            onSet: function (e, data) {
			       $(this).rateYo("option", "readOnly", true);
			       var proid = $("#rating-id").val();
        		   var com = $("#rating-com").val();
        		   var star = data.rating();
			       $.ajax({
		            type:"POST",
		            url:"Ajax/ajax.php",
		            data:{com:com,id_product:proid,star:star,act:"rating",iduser:""},
		            success: function(result) {
		            	$(".kkrating .tb").slideDown();
		            }
		        });
			    }
	        });
	      });
	    </script>';
	    return $html;
    }


}
?>