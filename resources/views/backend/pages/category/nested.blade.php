<?php
if (!isset($dash))
    $dash = '-';
else
    $dash .= '-';
?>

@foreach($childrenData as $child)
    @if($child->child)
        <option value="{{$child->id}}"> {{$dash}} {{$child->category_name}}</option>
            <?php $dash .= '-'; ?>
        @include('backend.pages.category.nested',['childrenData' => $child->child])
            <?php $dash = substr($dash, 0, -1); ?>
    @else
        <option value="{{$child->id}}">{{$dash}} {{$child->category_name}}</option>
    @endif
@endforeach