<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Contact</title>
</head>
<body>

    <h1>Edit Contact</h1>
    <form method ="post" action=" {{ route('contact.update') }}" enctype="multipart/form-data" >
        @csrf
        <input type="hidden"  name= "contact_id" id="contact_id" value = "{{ $contact[0]->contact_id}}"> <br>
        <label for="">Name</label>
        <input type="text"  name= "contact_name" id="name" value = "{{ $contact[0]->contact_name}}"> <br>
        <label for="">Company</label>
        <input type="text"  name= "company"  id="company" value = "{{ $contact[0]->company}} "> <br>
        <label for="">Phone</label>
        <input type="number"   name= "phone" id="phone"  value = "{{ $contact[0]->phone}}"> <br>
        <label for="">Email</label>
        <input type="email"  name= "email"  id="email"  value = "{{ $contact[0]->email}}"> <br>
        <button type="submit">Submit</button>

    </form>




</body>
</html>
