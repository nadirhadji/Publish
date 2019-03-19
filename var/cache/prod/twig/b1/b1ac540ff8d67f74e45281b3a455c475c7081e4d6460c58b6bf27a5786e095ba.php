<?php

/* @FOSUser/Resetting/request.html.twig */
class __TwigTemplate_bd382b974381b894f4d313eb00cc6861de45fa4d3bade80c4c7e5d5311121616 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 2
        $this->parent = $this->loadTemplate("layout.html.twig", "@FOSUser/Resetting/request.html.twig", 2);
        $this->blocks = [
            'fos_user_content' => [$this, 'block_fos_user_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_fos_user_content($context, array $blocks = [])
    {
        // line 6
        echo "
";
        // line 7
        $this->loadTemplate("@FOSUser/Resetting/request_content.html.twig", "@FOSUser/Resetting/request.html.twig", 7)->display($context);
        // line 8
        echo "
";
    }

    public function getTemplateName()
    {
        return "@FOSUser/Resetting/request.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 8,  38 => 7,  35 => 6,  32 => 5,  15 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@FOSUser/Resetting/request.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/FOSUserBundle/views/Resetting/request.html.twig");
    }
}
