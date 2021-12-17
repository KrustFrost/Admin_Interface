@extends('layouts.app')
@section('content')
<link href="{{ mix('css/library.css')}}" rel="stylesheet">
<form id="table_create" method="post"   action="{{ route('lms_create_post')}}" enctype="multipart/form-data">
    @csrf
<table  class=" w-1"> 
     <tr class="">
           <td>
		   *Name :
		   
		  </td>
		
		  
		  <td>
		
		    <input type ="text" placeholder ="Name"  name="name">
			</td>
  </tr>

  <tr>
           <td>
		   Quantity Books :
		   
		  </td>
		
		  
		  <td>
		  
		    <input type ="text"  placeholder="Quantity Books" Quantity ="">
			</td>
  </tr>
  
  
     <td>
		    ID:
		   
		  </td>
		
		  
		  <td>
		  
		    <input type ="text"  placeholder ="ID"   ID ="">
			</td>
  </tr>
  
   <td>
		    BOOK ID No:
		   
		  </td>
		
		  
		  <td>
		  
		    <input type ="text"  placeholder ="BOOK ID No"  Book ID No ="">
			</td>
  </tr>
  
  <td>
  
          *Title Of Book:
		   
		  </td>
		
		  
		  <td>
		  
		    <input type ="file"  name="book"/>
		</td>
  </tr>
    
  <td>
  
      Borrow or Not Borrowed:
		   
		  </td>
		
		  
		  <td>
		  
		    <input type ="radio"   name ="Borrowed"> Borrowed
			<input type ="radio"   name ="Not Borrowed"> Not Borrowed
			</td>
  </tr>
  
   <td>
		  
		    <input type ="Submit"  value="Submit">
			
  </tr>
   <td>
  </table>
  @error('name')
   <p class="text-red-500">{{$message}}</p>
   @enderror
   @error('book')
   <p class="text-red-500">{{$message}}</p>
   @enderror
  </form>
@endsection