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

/* parts/_header.html.twig */
class __TwigTemplate_32a09c1f9c973b1a713e7d61cecf7f5d7581df8c9a3036280a9f70a0f0225b9b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "    <nav class=\"navbar sticky-top navbar-expand-lg navbar-light bg-light\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"?page=home\">Blog // Corenthin FLAMAND</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" aria-current=\"page\" href=\"/\">Présentation</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"/contact\">Contact</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/articles\">Articles</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"/inscription\">Inscription</a>
                    </li>
                    ";
        // line 21
        if ( !twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "user", [], "any", false, false, false, 21)) {
            // line 22
            echo "                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/se-connecter\">Connexion</a>
                        </li>
                    ";
        }
        // line 26
        echo "                    ";
        if (twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "user", [], "any", false, false, false, 26)) {
            // line 27
            echo "                        <li class=\"nav-item\">
                             <a class=\"nav-link\" href=\"/se-deconnecter\">Déconnexion</a>
                        </li>
                    ";
        }
        // line 31
        echo "                    ";
        if ((twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "user", [], "any", false, false, false, 31) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "user", [], "any", false, false, false, 31), "isAdmin", [], "any", false, false, false, 31))) {
            // line 32
            echo "                        <li class=\"nav-item\">
                             <a class=\"nav-link\" href=\"/admin\">Administration</a>
                        </li>
                    ";
        }
        // line 36
        echo "                    
                </ul>
            </div>
         </div>
    </nav>";
    }

    public function getTemplateName()
    {
        return "parts/_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 36,  79 => 32,  76 => 31,  70 => 27,  67 => 26,  61 => 22,  59 => 21,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("    <nav class=\"navbar sticky-top navbar-expand-lg navbar-light bg-light\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"?page=home\">Blog // Corenthin FLAMAND</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" aria-current=\"page\" href=\"/\">Présentation</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"/contact\">Contact</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/articles\">Articles</a>
                    </li>
                    <li class=\"nav-item\">
                         <a class=\"nav-link\" href=\"/inscription\">Inscription</a>
                    </li>
                    {% if not session.user %}
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/se-connecter\">Connexion</a>
                        </li>
                    {% endif %}
                    {% if session.user %}
                        <li class=\"nav-item\">
                             <a class=\"nav-link\" href=\"/se-deconnecter\">Déconnexion</a>
                        </li>
                    {% endif %}
                    {% if session.user and session.user.isAdmin %}
                        <li class=\"nav-item\">
                             <a class=\"nav-link\" href=\"/admin\">Administration</a>
                        </li>
                    {% endif %}
                    
                </ul>
            </div>
         </div>
    </nav>", "parts/_header.html.twig", "F:\\wamp64\\www\\corenthin_projet5\\templates\\parts\\_header.html.twig");
    }
}
