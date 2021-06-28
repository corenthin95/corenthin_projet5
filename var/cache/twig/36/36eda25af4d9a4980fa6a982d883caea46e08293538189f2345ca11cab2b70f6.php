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

/* homepage/home.html.twig */
class __TwigTemplate_40ae678e029e5eef0e5dc510142a5df8e27858eab26484e06a51cb2008af9ae6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        $macros["form"] = $this->macros["form"] = $this->loadTemplate("form.html.twig", "homepage/home.html.twig", 7)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "homepage/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <title>Blog Professionnel - Accueil</title>
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "
    <!-- Header -->
    <header>
        <div class=\"container\">
            <div class=\"row\">
                <h1>Bienvenue <br><span>sur mon Blog professionnel<span></h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non congue leo, in molestie dui. Nunc sit amet urna sit amet est luctus accumsan id id turpis. In hac habitasse platea dictumst. Donec dolor eros, cursus eget ante eu, facilisis ullamcorper tortor. Morbi orci nibh, semper malesuada ligula in, pretium varius est.
                </p>
            </div>
            <div class=\"row\" id=\"articles-row\">
                <p id=\"infos-articles\">Retrouvez les articles via ce lien</p>
                <button type=\"button\" class=\"btn btn-light\" data-toggle=\"modal\" data-target=\"#global_modal\" id=\"articles-button\">
                    <a href=\"/articles\">Page des articles</a>
                </button>
            </div>
        </div>
    </header>
    
    <!-- Presentation -->
    <section id=\"presentation\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <h2 id=\"section-name-presentation\">Présentation</h2>
            </div>
            <div class=\"row\" id=\"presentation-row\">
                <div class=\"col-3\" id=\"profile-pic\">
                    <img src=\"img/anonym.jpg\" alt=\"profile picture\">
                </div>
                <div class=\"col-3\" id=\"name-presentation\">
                    <p id=\"title-name\">Corenthin <br>FLAMAND<p>
                </div>
                <div class=\"col-6\">
                    <p id=\"description-presentation\">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non congue leo, in molestie dui. Nunc sit amet urna sit amet est luctus accumsan id id turpis. In hac habitasse platea dictumst. Donec dolor eros, cursus eget ante eu, facilisis ullamcorper tortor.
                    </p>
                </div>
            </div>
            <div class=\"row\">
                <p id=\"cv-download\">Vous pouvez retrouver mon CV<br><span>en cliquant sur le bouton juste en dessous</span></p>
            </div>
            <div class=\"row\" id=\"cv-row\">
                <button type=\"button\" class=\"btn btn-light\" data-toggle=\"modal\" data-target=\"#global_modal\" id=\"cv-button\">
                    <a download=\"CVCorenthinFlamand\" href=\"img/pdf/CV_corenthin_flamand.pdf\">Download</a>
                </button>
            </div>  
        </div>
    </section>

    <!-- Contact -->
    <section id=\"contact\">
        <div class=\"container\">
            <div class=\"row\">
                <h2 id=\"section-name-contact\">Contact</h2>
            </div>
            <form id=\"contact-form\">

                ";
        // line 67
        echo twig_call_macro($macros["form"], "macro_input", ["name", "Nom / Prénom", ($context["name"] ?? null)], 67, $context, $this->getSourceContext());
        echo "
                ";
        // line 68
        echo twig_call_macro($macros["form"], "macro_input", ["mail", "E-mail", ($context["email"] ?? null), ["type" => "email"]], 68, $context, $this->getSourceContext());
        echo "
                ";
        // line 69
        echo twig_call_macro($macros["form"], "macro_textarea", ["message", "Message"], 69, $context, $this->getSourceContext());
        echo "

                <div class=\"row\">
                    <button type=\"submit\" class=\"btn btn-primary\" id=\"contact-button\">Envoyer</button>
                </div>
            </form>
        </div>
    </section>
    
";
    }

    // line 80
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 81
        echo "        <!-- Footer -->
        <footer>
            <div class=\"container-fluid\" id=\"footer-padding\">
                <div class=\"row\" id=\"footer-title\">
                    <div class=\"col-6\">
                        <h3>Adresse Postale</h3>
                        <p>21, cours Jean Jaures<br>33100 BORDEAUX</p>
                    </div>
                    <div class=\"col-6\">
                        <h3>Liens Externes</h3>
                        <ul>
                        </ul>
                    </div>
                </div>
            </div>
            <div class=\"container-fluid\" id=\"copyright-row\">
                <div class=\"row\">
                    <p>Copyright © Corenthin FLAMAND 2021</p>
                </div>
            </div>
        </footer>
    ";
    }

    public function getTemplateName()
    {
        return "homepage/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 81,  145 => 80,  131 => 69,  127 => 68,  123 => 67,  64 => 10,  60 => 9,  55 => 4,  51 => 3,  46 => 1,  44 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block head %}
    <title>Blog Professionnel - Accueil</title>
{% endblock %}

{% import 'form.html.twig' as form %}

{% block content %}

    <!-- Header -->
    <header>
        <div class=\"container\">
            <div class=\"row\">
                <h1>Bienvenue <br><span>sur mon Blog professionnel<span></h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non congue leo, in molestie dui. Nunc sit amet urna sit amet est luctus accumsan id id turpis. In hac habitasse platea dictumst. Donec dolor eros, cursus eget ante eu, facilisis ullamcorper tortor. Morbi orci nibh, semper malesuada ligula in, pretium varius est.
                </p>
            </div>
            <div class=\"row\" id=\"articles-row\">
                <p id=\"infos-articles\">Retrouvez les articles via ce lien</p>
                <button type=\"button\" class=\"btn btn-light\" data-toggle=\"modal\" data-target=\"#global_modal\" id=\"articles-button\">
                    <a href=\"/articles\">Page des articles</a>
                </button>
            </div>
        </div>
    </header>
    
    <!-- Presentation -->
    <section id=\"presentation\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <h2 id=\"section-name-presentation\">Présentation</h2>
            </div>
            <div class=\"row\" id=\"presentation-row\">
                <div class=\"col-3\" id=\"profile-pic\">
                    <img src=\"img/anonym.jpg\" alt=\"profile picture\">
                </div>
                <div class=\"col-3\" id=\"name-presentation\">
                    <p id=\"title-name\">Corenthin <br>FLAMAND<p>
                </div>
                <div class=\"col-6\">
                    <p id=\"description-presentation\">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non congue leo, in molestie dui. Nunc sit amet urna sit amet est luctus accumsan id id turpis. In hac habitasse platea dictumst. Donec dolor eros, cursus eget ante eu, facilisis ullamcorper tortor.
                    </p>
                </div>
            </div>
            <div class=\"row\">
                <p id=\"cv-download\">Vous pouvez retrouver mon CV<br><span>en cliquant sur le bouton juste en dessous</span></p>
            </div>
            <div class=\"row\" id=\"cv-row\">
                <button type=\"button\" class=\"btn btn-light\" data-toggle=\"modal\" data-target=\"#global_modal\" id=\"cv-button\">
                    <a download=\"CVCorenthinFlamand\" href=\"img/pdf/CV_corenthin_flamand.pdf\">Download</a>
                </button>
            </div>  
        </div>
    </section>

    <!-- Contact -->
    <section id=\"contact\">
        <div class=\"container\">
            <div class=\"row\">
                <h2 id=\"section-name-contact\">Contact</h2>
            </div>
            <form id=\"contact-form\">

                {{ form.input('name', 'Nom / Prénom', name) }}
                {{ form.input('mail', 'E-mail', email, {type: 'email'}) }}
                {{ form.textarea('message', 'Message') }}

                <div class=\"row\">
                    <button type=\"submit\" class=\"btn btn-primary\" id=\"contact-button\">Envoyer</button>
                </div>
            </form>
        </div>
    </section>
    
{% endblock %}

{% block footer %}
        <!-- Footer -->
        <footer>
            <div class=\"container-fluid\" id=\"footer-padding\">
                <div class=\"row\" id=\"footer-title\">
                    <div class=\"col-6\">
                        <h3>Adresse Postale</h3>
                        <p>21, cours Jean Jaures<br>33100 BORDEAUX</p>
                    </div>
                    <div class=\"col-6\">
                        <h3>Liens Externes</h3>
                        <ul>
                        </ul>
                    </div>
                </div>
            </div>
            <div class=\"container-fluid\" id=\"copyright-row\">
                <div class=\"row\">
                    <p>Copyright © Corenthin FLAMAND 2021</p>
                </div>
            </div>
        </footer>
    {% endblock %}
", "homepage/home.html.twig", "F:\\wamp64\\www\\corenthin_projet5\\templates\\homepage\\home.html.twig");
    }
}
