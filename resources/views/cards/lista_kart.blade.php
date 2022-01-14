
@extends('layout_master')


@section('content')

<div class="row mt-10">
    <div class="col">
   
        <a href="{{url('/cards/create')}}" class="btn btn-primary ">Dodaj kartę</a>
    </div>
   
</div>


  <div class=" table-responsive">
   
        <table class="table table-hover">
          <thead class="bg-gray-100">
            <tr>
              <th scope="col">
               Lp
              </th>
              <th scope="col" >
                Numer karty
              </th>
              <th scope="col" >
                PIN
              </th>
              <th scope="col" >
                Data aktywacji
              </th>
              <th scope="col" >
                Data ważności 
              </th>
              <th scope="col" >
                Saldo
              </th>
             <th scope="col" >
                Akcja
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($cards as $card)
                 <tr>
              <td class="">
                     {{$loop->iteration}}
              </td>
              <td class="">
                <div class="">{{$card->numerKarty}}</div>
              </td>
              <td class="">
                <div class="">{{$card->PIN}}</div>
              </td>
              <td class="">
                <span class="">
                  {{$card->dataAktywacji}}
                </span>
              </td>
              <td class="">
                {{$card->dataWaznosci}}
              </td>
              <td class="">
                {{number_format($card->kwota,2)}} zł
              </td>
              <td >
                   <form action="{{ route('cards.destroy',$card->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('cards.edit',$card->id) }}">Edycja</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Kasuj</button>
                </form>
              </td>
            </tr>
            @empty
             <tr>
                 <td colspan="6" class="px-6 py-4 whitespace-nowrap">
                <div class=" items-center text-center  ">
                    <div class="text-sm font-medium text-gray-900 text-center">
                     Brak danych 
                    </div>
                </div>
              </td>
            </tr>
                @endforelse
          </tbody>
        </table>
            
      <div class="row">
          {{$cards->onEachSide(5)->links()}}
      </div>
      
      
      <div class="row">
          @if (session('success_delete'))
          
          <div class="alert alert-success" role="alert">
                {{session('success_delete')}}
          </div>
          @endif
      </div>
  </div>


@endsection
