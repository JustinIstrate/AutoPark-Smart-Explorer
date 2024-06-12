<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEEE System Requirements Specification</title>
    <link rel="stylesheet" href="styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap"
        rel="stylesheet">
</head>
<body>
    <section class="header">
    <?php include '../common/navBar.php'; ?>
    </section>
    <div class="container">
        <header>
            <h1>AutoPark Smart Explorer Documentation</h1>
        </header>

        <nav>
            <ul class="introClass">
                <li class = "specialHover"><a href="#introduction">1.Introduction</a></li>
                <li class = "specialHover"><a href="#pages">2.Pages</a></li>
                <li class = "specialHover"><a href="#technologies-stack">3.Technologies Stack</a></li>
                <li class = "specialHover"><a href="#functional-requirements">4.Functional requirements</a></li>
                <li class = "specialHover"><a href="#other-requirements">5.Other Requirements</a></li>
                <li class = "specialHover"><a href="#bonuses">6.Bonuses</a></li>
            </ul>
        </nav>

        <section id="introduction">
            <h2>1. Introduction</h2>
            <p> The website aims to provide a platform for users to explore and interact with CSV files regarding automotive data, as well as view data and graphics related to these files. Additionally, an admin login feature will allow administrators to manage and import CSV documents.</p>
            </section>

        <section id="pages">
            <h2>2. Pages</h2>
    <!-- Home Page -->
    <section>
        <h3>Home Page</h3>
        <p>Display information about the website's purpose and features.</p>
    </section>

    <!-- CSV Explorer Page -->
    <section>
        <h3>CSV Explorer Page</h3>
        <p>Allows users to view a list of CSV documents.</p>
        <p>Provides options to download or preview the contents of each CSV file.</p>
    </section>

    <!-- Data Explorer Page -->
    <section>
        <h3>Data Explorer Page</h3>
        <p>Users can preview data from CSV files.</p>
        <p>Includes graphical representations of the data, such as charts or graphs.</p>
    </section>

    <!-- Admin Login Page -->
    <section>
        <h3>Admin page</h3>
        <p>Admin login feature to manage and import CSV files.</p> 
    </section>
        </section>

        <section id="technologies-stack">
            <h2>3. Technologies Stack</h2>
           <section>
        <h3>Front end</h3>
        <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
        </ul>
        <br/>
        <h3>Back end</h3>
        <ul>
            <li>PHP</li>
            <li>MySQL</li>
    </section>
        </section>

        <section id="functional-requirements">
            <h2>4. Functional requirements</h2>
            <h3>Admin login & data import</h3>
            <h3>Data export</h3>
            <h3>CSV Searching and filtering (Not done yet)</h3>
            <h3>Data generated graphs (Not done yet)</h3>
            
        </section>

        <section id="other-requirements">
            <h2>5. Other Requirements</h2>
            <h3>Responsive design</h3>
            <h3>Admin login feature</h3>
            <h3>Import CSV files</h3>
            <h3>Export data in CSV, WebP, and SVG formats</h3>
            <h3>Search and filter options</h3>
            <h3>Interactive data visualization</h3>
            <h3>Download and preview options for CSV files</h3>
            <h3>Secure data handling</h3>
            <h3>Documentation and user guide</h3>
            <h3>Testing and validation</h3>
            
        </section>

        <section id="bonuses">
            <h2>6.Bonuses</h2>
        </section>
    </div>

</body>
</html>
