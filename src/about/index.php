<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="icon" href="../common/carr.png" type="image/png">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../common/navBar.php'; ?>
    <div class="container">
        <header>
            <h1>AutoPark Smart Explorer Documentation</h1>
        </header>

        <nav>
            <ul class="introClass">
                <li class="specialHover"><a href="#introduction">1.Introduction</a></li>
                <li class="specialHover"><a href="#pages">2.Pages</a></li>
                <li class="specialHover"><a href="#technologies-stack">3.Technologies Stack</a></li>
                <li class="specialHover"><a href="#functional-requirements">4.Functional requirements</a></li>
                <li class="specialHover"><a href="#other-requirements">5.Other Requirements</a></li>
                <li class="specialHover"><a href="#bonuses">6.Bonuses</a></li>
            </ul>
        </nav>

        <section id="introduction">
            <h2>1. Introduction</h2>
            <p> The website aims to provide a platform for users to explore and interact with <i>large files </i>regarding automotive data, as well as <i>view</i> and <i>download</i> data (<i> CSV </i> or <i> JSON </i>) and graphics (that can be exported as <i>SVG</i> or <i>WebP</i>) related to these files. Additionally, an <i>admin login</i> feature will allow administrators to manage and import documents.</p>
        </section>

        <section id="pages">
            <h2>2. Pages</h2>
            <!-- Home Page -->
            <section>
                <h3>Home Page</h3>
                <p>Display information about the website's purpose and features.</p>
            </section>

            <!-- Data Explorer Page -->
            <section>
                <h3>Data Explorer Page</h3>
                <p>Allows users to view, search or filter a list of CSV documents.</p>
                <p>Provides options to download or preview the contents of each file.</p>
                <p>Additionaly if you are logged in as a admin you can also erase a document from the data base.</p>
            </section>

            <!-- Data Preview Page -->
            <section>
                <h3>Data Preview Page</h3>
                <p>Users can preview data from CSV files.</p>
                <p>Includes graphical representations of the data, more exactly 3 types of charts: bar, doughnut and line charts.</p>
                <p>Normal users can only export data from here as CSV or JSON.</p>
                <p>Admins can also import.</p>
            </section>

            <!-- Admin Login Page -->
            <section>
                <h3>Admin page</h3>
                <p>Admin login feature to manage and import CSV files.</p>
                <p><mark>Default credentials </mark>: admin - password.</p>
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
                <br />
                <h3>Back end</h3>
                <ul>
                    <li>PHP</li>
                    <li>MySQL</li>
            </section>
        </section>

        <section id="functional-requirements">
            <h2>4. Functional requirements</h2>
            <h3>Admin login & data import</h3>
            <h3>Data export as CSV or JSON</h3>
            <h3>Data list Searching and filtering (Not done yet)</h3>
            <h3>Data generated graphs & data preview</h3>

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
            <p><i>Data Base Migration.</i> For a easier set-up we added some default data the user can use with this command executed in the terminal:
               <mark> mysql -u root -p < migration.sql </mark>.</p>
        </section>
    </div>

</body>

</html>