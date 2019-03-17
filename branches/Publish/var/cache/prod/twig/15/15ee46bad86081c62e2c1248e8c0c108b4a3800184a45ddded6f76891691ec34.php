<?php

/* @Twig/Exception/trace.txt.twig */
class __TwigTemplate_7f37aa8ce280153955164652d4a0601218a4e3562dbe619924533d4a9f1046da extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if (twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "function", [])) {
            // line 2
            echo "at ";
            echo ((twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "class", []) . twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "type", [])) . twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "function", []));
            echo "(";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->formatArgsAsText(twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "args", []));
            echo ")";
        }
        // line 4
        if (( !twig_test_empty(((twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "file", [], "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "file", []), "")) : (""))) &&  !twig_test_empty(((twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "line", [], "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "line", []), "")) : (""))))) {
            // line 5
            echo ((twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "function", [])) ? ("
     (") : ("at "));
            echo twig_replace_filter(strip_tags($this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->formatFile(twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "file", []), twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "line", []))), [(" at line " . twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "line", [])) => ""]);
            echo ":";
            echo twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "line", []);
            echo ((twig_get_attribute($this->env, $this->source, ($context["trace"] ?? null), "function", [])) ? (")") : (""));
        }
    }

    public function getTemplateName()
    {
        return "@Twig/Exception/trace.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  32 => 4,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Twig/Exception/trace.txt.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/trace.txt.twig");
    }
}
