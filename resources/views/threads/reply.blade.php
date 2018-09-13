  <reply :attributes ="{{$reply}}" inline-template>

    <div class="card" style="margin-bottom:25px;">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <div> 
           {{$reply->owner->name}} said {{$reply->created_at->diffForHumans()}}
         </div>

         <div>
          @auth
            <favorite :reply="{{ $reply }}"></favorite>
          @endauth
        </div>
      </div>
    </div>

    <div class="card-body">

      <div v-if="editing">
        <div class="form-group">

          <textarea class="form-control" v-model="body"></textarea>

          <div class="d-flex justify-content" style="margin-top:1rem">
            <button class="btn btn-sm" style="margin-right:1rem;" @click="update">Update</button>  
            <button class="btn btn-sm btn-danger" style="margin-right:1rem;" @click="editing = false">Cancel</button>
          </div>

        </div>
      </div>

        <div v-else v-text="body">
        </div>

      </div>

      @can('update', $reply)
      <div class="card-footer d-flex justify-content">

        <button class="btn btn-sm" style="margin-right:1rem;" @click="editing = true">Edit</button>

        <button class="btn btn-sm btn-danger" style="margin-right:1rem;" @click="destroy">Delete</button>

      </div>
      @endcan

    </div>
    {{$replies->links()}}

  </reply>
