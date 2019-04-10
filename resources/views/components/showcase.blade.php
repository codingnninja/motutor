<div class="album bg-white">
  <div class="container">
    <div class="text-center">
      <h2 style="margin:-30px 0 20px 0"><br> Available schools</h2>
    </div><br>
    <div class="row">
      {{--showcase refers to schools or lessons displayed in cards --}}
        @foreach ($items as $item)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                @if (count($items) <= 3)
                  <img src="{{url('images/photo.jpg')}}" class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                @endif
                <div class="card-body">
                  <h6 class="card-text myfont">
                    {{ $item->title}}
                  </h6>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{url('schools/'.$item->slug) }}">      
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                          <i class="fa fa-eye"></i>
                        </button>
                      </a>
                    </div>
                    <small class="text-success">
                        @if(isset($item->tags))
                          @foreach($item->tags as $tag) 
                              {{$tag->tag."*"}}
                          @endforeach
                        @endif 
                    </small>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
    </div>
    {{-- $items->links() --}}
  </div>
</div>
