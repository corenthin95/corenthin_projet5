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

/* form.html.twig */
class __TwigTemplate_e79ce803d7d6e5dcaabd3564900d32b8ea598ed7ec8f73cfc2a5f95e479d95a4 extends Template
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
        // line 7
        echo "
";
        // line 15
        echo "

";
    }

    // line 1
    public function macro_input($__name__ = null, $__label__ = null, $__value__ = null, $__options__ = [], ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "label" => $__label__,
            "value" => $__value__,
            "options" => $__options__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 2
            echo "    <div class=\"row mb-3 ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "class", [], "any", false, false, false, 2), "html", null, true);
            echo "\">
        <label for=\"";
            // line 3
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" class=\"form-label\">";
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "</label>
        <input type=\"";
            // line 4
            ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "type", [], "any", false, false, false, 4)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "type", [], "any", false, false, false, 4), "html", null, true))) : (print ("text")));
            echo "\" class=\"form-control\" id=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\">
    </div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 8
    public function macro_inputPassword($__name__ = null, $__label__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "label" => $__label__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 9
            echo "    <div class=\"row mb-3\">
        <label for=\"";
            // line 10
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" class=\"form-label\">";
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "</label>
        <input type=\" ";
            // line 11
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" class=\"form-control\" id=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\">
        <button type=\"button\" class=\"btn btn-primary\" id=\"showpassword\">Voir</button>
    </div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 17
    public function macro_textarea($__name__ = null, $__label__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "label" => $__label__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 18
            echo "    <div class=\"row mb-3\">
        <label for=\"";
            // line 19
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" class=\"form-label\">";
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "</label>
        <textarea type=\"text\" class=\"form-control\" id=\"";
            // line 20
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\"></textarea>
    </div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 20,  148 => 19,  145 => 18,  131 => 17,  114 => 11,  108 => 10,  105 => 9,  91 => 8,  73 => 4,  67 => 3,  62 => 2,  46 => 1,  40 => 15,  37 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("{% macro input(name, label, value = null, options = []) %}
    <div class=\"row mb-3 {{ options.class }}\">
        <label for=\"{{ name }}\" class=\"form-label\">{{ label }}</label>
        <input type=\"{{ options.type ?: 'text' }}\" class=\"form-control\" id=\"{{ name }}\" name=\"{{ name }}\" value=\"{{ value }}\">
    </div>
{% endmacro %}

{% macro inputPassword(name, label) %}
    <div class=\"row mb-3\">
        <label for=\"{{ name }}\" class=\"form-label\">{{ label }}</label>
        <input type=\" {{ name }}\" class=\"form-control\" id=\"{{ name }}\" name=\"{{ name }}\">
        <button type=\"button\" class=\"btn btn-primary\" id=\"showpassword\">Voir</button>
    </div>
{% endmacro %}


{% macro textarea(name, label) %}
    <div class=\"row mb-3\">
        <label for=\"{{ name }}\" class=\"form-label\">{{ label }}</label>
        <textarea type=\"text\" class=\"form-control\" id=\"{{ name }}\" name=\"{{ name }}\"></textarea>
    </div>
{% endmacro %}", "form.html.twig", "F:\\wamp64\\www\\corenthin_projet5\\templates\\form.html.twig");
    }
}
