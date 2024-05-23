<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Sedan+SC&display=swap');
    </style>
    <title>Choice page</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-choiceBody">

    <section class="p-4 bg-white border my-11" style="height: 600px; width: 1300px">
        <a class="flex-none text-3xl font-bold text-gray-800" href="/" aria-label="Brand">
            W<span class="text-primary">e</span> Car<span class="text-primary">e</span>
        </a>
       <div class="flex justify-center">
        <div class="flex flex-col gap-y-7 mt-11">
            <p class= "text-2xl text-center">What brings you to We care?</p>
            <div class="flex items-center justify-center gap-x-11">
                <a href="{{ route('doctorSignup') }}" class="flex flex-col items-center bg-white border rounded-md h-72 w-96">
                    <img class="" src="{{ asset('assets/img/DoctorSignup.png') }}" alt="">


                    <p class="text-2xl">I’ m a doctor</p>
                    <p class="text-xs text-gray-600">Stay informed about your patients.</p>
                </a>
                <a href="{{ route('patientSignup') }}" class="flex flex-col items-center bg-white border rounded-md h-72 w-96">
                    <img class="" src="{{ asset('assets/img/PatientSignup.png') }}" alt="">
                    <p class="text-2xl">I’ m a patients</p>
                    <p class="text-xs text-gray-600">The most complete solution in your hands</p>

                </a>
            </div>
            <div>
                <p class= "text-base text-center text-slate-700">Already using Contra? <span class="text-primary">Sign in</span></p>
               <div class="mt-2">
                <p class= "text-sm font-light text-center text-slate-400">By continuing, you agree to Wecare Terms of Use and confirm that</p>
                <p class= "text-sm font-light text-center text-slate-400">you have read Contra's Privacy Policy</p>
               </div>
            </div>


        </div>
        
       </div>

    </section>

</body>

</html>
