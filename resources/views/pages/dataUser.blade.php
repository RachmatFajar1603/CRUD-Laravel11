@extends('layouts.main')

@section('content')


<div class="relative overflow-x-auto shadow-xl sm:rounded-lg w-3/4 ml-44 mt-10" data-aos="fade-down" data-aos-duration="1000">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Our Team
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Find a team that is acceptable to enter our community</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Full Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>

        <tbody>
        @foreach ($user as $user)


          <tr class="bg-white border-b hover:bg-gray-50">
            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap text-center">
                {{$user->id}}
            </th>
            <td class="px-6 py-4 text-center">
                {{$user->name}}
            </td>
            <td class="px-6 py-4 text-center">
                {{$user->email}}
            </td>
            <td class="px-6 py-4 text-center">
                {{$user->address}}
            </td>
            <td class="px-6 py-4 text-center">
                {{$user->phone}}
            </td>
            <td class=" px-4 py-5">
              <a href="{{route('user.edit', $user->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
              <form class="mt-5" method="POST" action="{{route('user.destroy', $user->id)}}" id="delete-user-from-{{$user->id}}">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="deleteUser({{$user->id}})">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>

    </table>


  </div>

  <script>
    function deleteUser(id){
        if(confirm('Are you sure you want to delete this user?')){
            document.getElementById('delete-user-from-'+id).submit()
        }
    }
  </script>

@endsection
