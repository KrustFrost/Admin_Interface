@extends('layouts.app')
@section('content')
  <link href="{{ mix('css/library.css')}}" rel="stylesheet">
<div id="create_book" class="w-full md:mt-56 ml-32 mr-32 bg-gray-100 p-5 h-full">
  <button type="button" class=" bg-green-400 hover:bg-green-800 p-2"><a href="/Library_Management_System/create">Add New Book</a></button>
<table  class="w-full border-4 m-2">
  <thead>
    <tr class="border-4">
      <th class="border-4">ID</th>
      <th class="border-4">E-Book</th>
      <th class="border-4">Publisher Name</th>
      <th>Action</th>
    </tr>
  </thead>
  @foreach($library as $librarys)
  <tbody class="text-center">
    <tr class="border-4">
      <td class="border-4">{{$librarys->id}}</td>
      <td class="border-4">{{$librarys->Title_of_Book}}</td>
      <td class="border-4">{{$librarys->Publisher_Name}}</td>
	  <td>		  
      <form action="/Library_Management_System/{{$librarys->id}}" method="post">
	  @csrf
	  @method('delete')
	  <button class="bg-red-300 hover:bg-red-600 p-1 m-1" type="submit" name="submit_delete" value="{{$librarys->id}}">Delete</button>
	  </form>
   <form action="/Library_Management_System/download/{{$librarys->id}}" method="post">
   @csrf
    <button class="bg-black text-white p-1 m-1" name="{{$librarys->id}}" type="submit">Download</button>
    </form>
		</td>
    </tr>
  </tbody>
  @endforeach
</table>
{{$library->links()}}
</div>
@endsection