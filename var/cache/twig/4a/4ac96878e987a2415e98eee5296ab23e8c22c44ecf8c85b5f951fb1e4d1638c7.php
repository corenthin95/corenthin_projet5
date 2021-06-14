<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_4d0b11e0ad243fdcd3394908f8cb8a2c17b06461adbc37625f8d4b34cf502e02 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    ";
        // line 8
        $this->displayBlock('head', $context, $blocks);
        // line 9
        echo "
    <title>Blog Professionnel</title>

    <!-- Bootstrap -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl\" crossorigin=\"anonymous\">

    <!-- CSS -->
    <link href=\"css/blog.css\" rel=\"stylesheet\">

    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap\" rel=\"stylesheet\"> 

</head>
<body>

    <!-- Navbar -->
    <nav class=\"navbar sticky-top navbar-expand-lg navbar-light bg-light\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"?page=home\">Blog // Corenthin FLAMAND</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" aria-current=\"page\" href=\"?page=home#presentation\">Présentation</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"?page=home#contact\">Contact</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"?page=articles\">Articles</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"?page=login\">Connexion</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"?page=register\">Inscription</a>
                    </li>
                </ul>
            </div>
         </div>
    </nav>

    ";
        // line 53
        $this->displayBlock('content', $context, $blocks);
        // line 55
        echo "
    ";
        // line 56
        $this->displayBlock('footer', $context, $blocks);
        // line 58
        echo "
    <!-- JavaScript Bundle with Popper -->
    <script>
        document.getElementById('showpassword').addEventListener('click', (e) => {
            e.preventDefault();
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
            e.target.innerText = e.target.innerText === 'Voir' ? 'Cacher' : 'Voir';
        })
    </script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0\" crossorigin=\"anonymous\"></script>

</body>
</html>";
    }

    // line 8
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
    }

    // line 53
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        echo "    ";
    }

    // line 56
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 57
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  140 => 57,  136 => 56,  132 => 54,  128 => 53,  121 => 8,  104 => 58,  102 => 56,  99 => 55,  97 => 53,  51 => 9,  49 => 8,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    {% block head %} {% endblock %}

    <title>Blog Professionnel</title>

    <!-- Bootstrap -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl\" crossorigin=\"anonymous\">

    <!-- CSS -->
    <link href=\"css/blog.css\" rel=\"stylesheet\">

    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap\" rel=\"stylesheet\"> 

</head>
<body>

    <!-- Navbar -->
    <nav class=\"navbar sticky-top navbar-expand-lg navbar-light bg-light\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"?page=home\">Blog // Corenthin FLAMAND</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" aria-current=\"page\" href=\"?page=home#presentation\">Présentation</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"?page=home#contact\">Contact</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"?page=articles\">Articles</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"?page=login\">Connexion</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"?page=register\">Inscription</a>
                    </li>
                </ul>
            </div>
         </div>
    </nav>

    {% block content %}
    {% endblock %}

    {% block footer %}
    {% endblock %}

    <!-- JavaScript Bundle with Popper -->
    <script>
        document.getElementById('showpassword').addEventListener('click', (e) => {
            e.preventDefault();
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
            e.target.innerText = e.target.innerText === 'Voir' ? 'Cacher' : 'Voir';
        })
    </script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0\" crossorigin=\"anonymous\"></script>

</body>
</html>", "base.html.twig", "F:\\wamp64\\www\\corenthin_projet5\\templates\\base.html.twig");
    }
}
