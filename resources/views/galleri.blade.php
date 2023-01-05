@extends('layout_frontend.app')
@section('content')
<div class="row my-3">
    <div class="col-12 text-center my-3">
        <h3>Galeri</h3>
    </div>
</div>

<div class="container-container mb-3">

    @foreach ($images as $item)
    <div class="gallery-container w-3 h-2">
        <div class="gallery-item">
        <div class="image">
            <img src="{{ Storage::url($item->photo) }}" alt="nature">
        </div>
        <div class="text">{{ $item->title }}</div>
        </div>
    </div>    
    @endforeach

</div>
@endsection
@section('css')
<style>
/* body {
  margin: 20px;
  padding: 0;
  text-align: center;
} */
.container-container{
  display: grid;
  grid-template-columns: repeat(6,1fr);
  grid-auto-rows: 100px 300px;
  grid-gap: 10px;
  grid-auto-flow: dense;
}

.gallery-item{
  width: 100%;
  height: 100%;
  position: relative;
}

.gallery-item .image{
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.gallery-item .image img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: 50% 50%;
  cursor: pointer;
  transition:.5s ease-in-out;
}

.gallery-item:hover .image img{
  transform: scale(1.5);
}

.gallery-item .text{
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
  font-size: 25px;
  pointer-events: none;
  z-index: 4;
  transition: .3s ease-in-out;
  -webkit-backdrop-filter: blur(5px) saturate(1.8);
  backdrop-filter: blur(5px) saturate(1.8);
}

.gallery-item:hover .text{
  opacity: 1;
  animation: move-down .3s linear;
  padding: 1em;
  width: 100%;
}

.w-1{
  grid-column: span 1;
}

.w-2{
  grid-column: span 2;
}

.w-3{
  grid-column: span 3;
}

.w-4{
  grid-column: span 4;
}

.w-5{
  grid-column: span 5;
}

.w-6{
  grid-column: span 6;
}

.h-1{
  grid-row: span 1;
}

.h-2{
  grid-row: span 2;
}

.h-3{
  grid-row: span 3;
}

.h-4{
  grid-row: span 4;
}

.h-5{
  grid-row: span 5;
}

.h-6{
  grid-row: span 6;
}

@media screen and (max-width:500px){
  .container{
    grid-template-columns: repeat(1,1fr);
  }
  .w-1,.w-2,.w-3,.w-4,.w-5,.w-6{
  grid-column:span 1;
  }
  
  .h-1,.h-2,.h-3,.h-4,.h-5,.h-6{
  grid-row: span 3;
  }
}



@keyframes move-down{

  0%{
    top: 10%;
  }
  50%{
    top: 35%;
  }
  100%{
    top: 50%;
  }
}    
</style>
@endsection
@section('js')

@endsection