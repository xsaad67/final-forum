<div class="card" style="margin-bottom:25px;">
    <div class="card-header">

        <div class="d-flex justify-content-between">    

            <div>
                <h3>This is reply section</h3>
            </div>

            @auth
            <div>
            {{--     <form method="POST" action="{{$thread->path()}}">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger">Delete</button>
                </form> --}}
            </div>
            @endauth
        </div>
    </div>   

    <div class="card-body">
        {{-- {{$thread->body}} --}}
    </div>
</div>