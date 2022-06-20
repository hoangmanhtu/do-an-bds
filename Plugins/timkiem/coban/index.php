<script type="text/javascript">
  $(document).ready(function() {
       $('.frm_timkiem').submit(function(){
          var timkiem = $('#name_tk').val();
          if(!timkiem){
            alert('<?=_banchuanhaptukhoatimkiem?> . ');
            $('#name_tk').focus();
          } else {
            window.location.href="tim-kiem.html&keywords="+timkiem;
          }
          return false;
      })

      $('.icon_search').click(function(event) {
        $('#timkiem').slideToggle(500);
        return false;
      });
  });
</script>
<div id="timkiem">
  <form action="tim-kiem.html" method="" name="frm2" class="frm_timkiem">
    <input type="text" autocomplete="off" name="timkiem" id="name_tk" class="input" placeholder="<?=_timkiem?> .">
    <button type="submit" value="" class="nut_tim"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
</div>