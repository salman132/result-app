## About Project

Students can submit their registration number and exam type (SSC/HSC), the system will then send a PIN code to the
registered mobile number. After the student inputs the PIN in the app, he/she will get their result

<h1>How to run this project</h1>
<ul>
    <li>composer install</li>
    <li>npm install</li>
    <li>npm run dev/watch</li>
    <li>php artisan migrate</li>
    <li>php artisan passport:install</li>
    <li>php artisan serve</li>
</ul>

<h1>Technologies</h1>
<ul>
    <li>Laravel 8</li>
    <li>SPA With Vue JS</li>
    <li>Vuex</li>
    <li>Passport</li>

</ul>

<h1>API LIST</h1>
<h3>All this API should must test with postman, because it requires passport token</h3>
<important>To get token you have to login first</important>

<pre>
    Sample User:
    - Level: SSC
    - Registration Number: 1321305
       <hr>
    Level: HSC
    - Registration Number: 1321306
<note>
Then it will ask for you a PIN number which is a random number.System will auto fill it up for you.<br>
After all the step you can get token in the response. <br>
</note>

    
</pre>

<ul>
    <li>
        <code>
            - Method: GET  http://127.0.0.1:8000/api/exam_type
        </code>
    </li>
    <li>
        <code>
            - Method: POST  http://127.0.0.1:8000/api/pre-login
        </code>
    </li>
    <li>
        <code>
            - Method: POST  http://127.0.0.1:8000/api/send_sms
        </code>
    </li>
    <li>
        <code>
            - Method: POST  http://127.0.0.1:8000/api/login
        </code>
    </li>
    <li>
        <code>
            - Method: GET  http://127.0.0.1:8000/api/result_data
        </code>
    </li>
    <li>
        <code>
            - Method: GET  http://127.0.0.1:8000/api/logout
        </code>
    </li>
</ul>
