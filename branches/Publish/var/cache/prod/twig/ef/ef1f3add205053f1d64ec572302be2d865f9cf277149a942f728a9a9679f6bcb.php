<?php

/* @Twig/Exception/exception.atom.twig */
class __TwigTemplate_bd96d9fa453cd1913b30b0d744640d0f906f7b9af15535478369ec2354eb4961 extends Twig_Template
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
        echo twig_include($this->env, $context, "@Twig/Exception/exception.xml.twig", ["exception" => ($context["exception"] ?? null)]);
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.atom.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Twig/Exception/exception.atom.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.atom.twig");
    }
}
