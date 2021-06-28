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
    <!-- Header -->
    ";
        // line 24
        $this->loadTemplate("parts/_header.html.twig", "base.html.twig", 24)->display($context);
        // line 25
        echo "
    <!-- BodyContent -->
    ";
        // line 27
        $this->displayBlock('content', $context, $blocks);
        // line 29
        echo "
    <!-- Footer -->
    ";
        // line 31
        $this->displayBlock('footer', $context, $blocks);
        // line 33
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

    // line 27
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "    ";
    }

    // line 31
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 32,  114 => 31,  110 => 28,  106 => 27,  99 => 8,  82 => 33,  80 => 31,  76 => 29,  74 => 27,  70 => 25,  68 => 24,  51 => 9,  49 => 8,  40 => 1,);
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
    <!-- Header -->
    {% include 'parts/_header.html.twig' %}

    <!-- BodyContent -->
    {% block content %}
    {% endblock %}

    <!-- Footer -->
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
