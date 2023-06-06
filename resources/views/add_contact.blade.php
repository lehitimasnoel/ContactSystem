<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Contact</title>
</head>
<body>

    <h1>Add Contact</h1>
    <form method ="post" action=" {{ route('contact.create') }}" enctype="multipart/form-data" >
        @csrf
        <label for="">Name</label>
        <input type="text"  name= "name" id="name"> <br>
        <label for="">Company</label>
        <input type="text"  name= "company"  id="company"> <br>
        <label for="">Phone</label>
        <input type="number"   name= "phone" id="phone"> <br>
        <label for="">Email</label>
        <input type="email"  name= "email"  id="email"> <br>
        <button type="submit">Submit</button>

    </form>




</body>
</html>
