 <div class="jumbotron text-center tagline"><br>
 <div class="container">
	<div class="row" style="background: rgba(0,0,0,0.6);padding: 40px;">
        <div class="col-md-12">
            <div id="custom-search-input" class="search-shadow">
                <form method="Post" action="{{route('search')}}" arial-label="Search"> @csrf   
                    <div class="input-group col-md-12 ">
                        <input type="text" name="searchQuery" class="form-control input-lg" placeholder="Search by program or area" />
                        <span class="input-group-btn">
                            <button class="btn btn-lg" type="search">
                                <i class="fa fa-search text-success"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
  
        @component('components.filter')
        @endcomponent 
	</div>
</div>
</div>