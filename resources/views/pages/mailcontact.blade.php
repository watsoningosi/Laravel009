<!--<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Return view in the mail class</title>
</head>
<body>
    <h1>It works Again</h1> 
    <p>Get to know more about your {{ $course }}</p>
</body>
</html>
-->
@component('mail::message')

#Series to like

Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab possimus modi cupiditate doloremque officiis recusandae itaque molestias quod vel fugiat accusamus voluptate ut, quidem provident suscipit nobis perferendis. Aperiam, quasi?

-Billions
-Foundation
-Peripheral

@component('mail::button', ['url' => 'https://paradigm.rf.gd'])

Visit Paradigm
    
@endcomponent
    
@endcomponent