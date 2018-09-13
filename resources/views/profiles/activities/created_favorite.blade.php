@component('profiles.activities.activity')

@slot('heading')
  <a href="/profiles/{{$profileUser->name}}">{{$profileUser->name}}</a> Favorited reply  <a href=""></a>
@endslot
@slot('body')
{{$record->subject->favorited->body}}
@endslot

@endcomponent