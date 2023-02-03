<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
            <tr>
        @foreach($blogs as $blog)
                <td> 
                    <img src="{{ $blog->getFirstMediaUrl() != null ? $blog->getFirstMediaUrl() : $blog->getFirstMediaUrl('image')   }}" alt="" width="100px">
                </td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog ->category->name }}</td>
                <td>{{ Str::limit($blog->body,15,'....') }} </td>
        @endforeach
            </tr> 
        </table>
   
</body>
</html>