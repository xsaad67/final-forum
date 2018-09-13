@component('profiles.activities.activity')

@slot('heading')
<a href="{{$record->subject->path()}}">{{$record->subject->title}}</a> by <a href="/profiles/{{$profileUser->name}}">{{$profileUser->name}}</a>
@endslot
@slot('body')
{{$record->subject->body}}
@endslot

@endcomponent