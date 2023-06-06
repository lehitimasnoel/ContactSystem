<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
</head>
<style>
    .dropdown-content {

  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}



    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>

<body>


    <h1>Contacts</h1>



    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href=" {{ route('contact.show_add_contact') }}" class="bg-white rounded-lg p-2">Add Contact</a> ||
        <a href="" class="bg-white rounded-lg p-2">Contacts</a> ||
        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>

    <div class="dropdown">
        <div id="myDropdown" class="dropdown-content">
          <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">

          @forelse ($contacts as $contact)

          <a href="">{{ $contact->contact_name }}</a>
          @empty
          @endforelse




        </div>
      </div>


    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="display">
            @forelse ($contacts as $contact)
            <tr>
                <th>{{ $contact->contact_name }}</th>
                <th>{{ $contact->company }}</th>
                <th>{{ $contact->email }}</th>
                <th>{{ $contact->phone }}</th>
                <th>
                    <a href="{{ route('contact.edit_contact',$contact->contact_id) }}" >Edit</a> ||
                    <form method="post" action="{{ route('contact.delete', $contact->contact_id) }}">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>

                    </form>


                </th>
            </tr>
            @empty
                <p class="text-white">You don't have any contacts.</p>
            @endforelse



        </tbody>

    </table>



</body>
</html>


<script>
    function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
