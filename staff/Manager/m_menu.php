<div id = "navbar">
    <nav class = "navbar navbar-default navbar-static-top" role = "navigation">
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#navbar-collapse-1">
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand" href = "#" style = "color:green;">System Menu</a>
        </div>

        <div class = "collapse navbar-collapse" id = "navbar-collapse-1">
            <ul class = "nav navbar-nav">
                <li><a href = "m_index.php">HOME</a></li>
                <li><a href = "members.php">MEMBERS</a></li>
                <li><a href = "Inactive.php">INACTIVE CLIENTS</a></li>
                <li class = "dropdown"><a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">GENERATE REPORTS<b class = "caret"></b></a>
                    <ul class = "dropdown-menu">
                        <li><a href = "#">Sales Report</a></li>
                        <li><a href = "#">Inquiry Report</a></li>
                        <li><a href = "members.php">Clients Report</a></li>
                    </ul>
                </li>
                <a href = "m_process.php?action=logout" name = "logout">
                    <button type = "button" class = "btn btn-warning"  style = "margin-top:10px; margin-left:450px;color:white;">LOGOUT</button>
                </a>
            </ul>
        </div><!--/.navbar-collapse -->
    </nav>
</div>
