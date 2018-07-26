<html>
    <head>
        <title>App Name</title>
    </head>
    <body>
        <div class="container">
            @foreach ($motherCompanyList as $motherCompany)
                <p>This is user {{ $motherCompany->m_company_name }}</p>
            @endforeach
        </div>
    </body>
</html>