
@foreach($posts as $post)
      <div class="card" style="margin-bottom:2rem;">
        <div class="card-header">
          <h2><a href="#">{{ $post->id}}. {{$post->title}}</a></h2>
        </div>
        <div class="card-body">
            <p>{{$post->body}}</p>
            <div class="text-center">
              <button type="button" class="btn btn-success">Read More</button>
            </div>
        </div>
      </div>
@endforeach
