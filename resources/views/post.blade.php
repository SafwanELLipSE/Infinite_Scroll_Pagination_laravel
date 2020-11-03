<html lang="en">
<head>
  <title>Infinite Scroll Pagination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

<section style="padding-top:6rem;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Infinite Scroll Pagination</h2>
      </div>
      <div class="col-md-12" id="post-data">
          @include('data')
      </div>
    </div>
  </div>
</section>
<div class="ajax-load text-center" style="display:none;">
  <iframe src="https://giphy.com/embed/xTk9ZvMnbIiIew7IpW" width="50" height="50" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/loop-loading-loader-xTk9ZvMnbIiIew7IpW"></a>Loading More Post...</p>
</div>

<script>
      function loadMoreData(page)
      {
        $.ajax({
          url:'?page=' + page,
          type:'GET',
          beforeSend: function()
          {
              $(".ajax-load").show();
          }
        })
        .done(function(data){
            if(data.html == " "){
                $(".ajax-load").html("No more records found...");
                return;
            }
            $(".ajax-load").hide();
            $("#post-data").append(data.html);
        })
        .fail(function(jqXHR,ajaxOptions,thrownError){
            alert("Server not responding.....");
        });
      }

      var page = 1;
      $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() >= $(document).height()){
          page++;
          loadMoreData(page);
        }
      });
</script>

</body>
</html>
