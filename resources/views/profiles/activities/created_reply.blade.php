@component('profiles.activities.activity')

@slot('heading')
 by <a href="/profiles/{{$profileUser->name}}">{{$profileUser->name}}</a> Replied to <a href="{{$record->subject->thread->path()}}">{{$record->subject->thread->title}}</a>
@endslot
@slot('body')
{{$record->subject->body}}
@endslot

@endcomponent