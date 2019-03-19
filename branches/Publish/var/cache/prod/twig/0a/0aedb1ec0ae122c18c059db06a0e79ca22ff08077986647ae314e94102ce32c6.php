<?php

/* base.html.twig */
class __TwigTemplate_46e2af4cf6d1f25b6b3156b68eaa29de1db8a718974c1090067369917a1a1b96 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'header' => [$this, 'block_header'],
            'header_navigation_links' => [$this, 'block_header_navigation_links'],
            'aside' => [$this, 'block_aside'],
            'fos_user_content' => [$this, 'block_fos_user_content'],
            'footer' => [$this, 'block_footer'],
            'controlSidebar' => [$this, 'block_controlSidebar'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "</head>

    <body class=\"hold-transition skin-blue sidebar-mini\">

        ";
        // line 14
        $this->displayBlock('body', $context, $blocks);
        // line 52
        echo "

    ";
        // line 54
        $this->displayBlock('javascripts', $context, $blocks);
        // line 55
        echo "
        </div>
    </body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        echo "Publish";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = [])
    {
    }

    // line 14
    public function block_body($context, array $blocks = [])
    {
        // line 15
        echo "        <div class=\"wrapper\">

            <header class=\"main-header\">

                ";
        // line 19
        $this->displayBlock('header', $context, $blocks);
        // line 24
        echo "
            </header>

            <aside class=\"main-sidebar\">

                ";
        // line 29
        $this->displayBlock('aside', $context, $blocks);
        // line 30
        echo "
            </aside>

            <div class=\"content-wrapper\">

                ";
        // line 35
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 36
        echo "
            </div>

            <footer class=\"main-footer\">

                ";
        // line 41
        $this->displayBlock('footer', $context, $blocks);
        // line 42
        echo "
            </footer>

            <aside class=\"control-sidebar control-sidebar-dark\">

                ";
        // line 47
        $this->displayBlock('controlSidebar', $context, $blocks);
        // line 48
        echo "
            </aside>

            ";
    }

    // line 19
    public function block_header($context, array $blocks = [])
    {
        // line 20
        echo "
                    ";
        // line 21
        $this->displayBlock('header_navigation_links', $context, $blocks);
        // line 22
        echo "
                 ";
    }

    // line 21
    public function block_header_navigation_links($context, array $blocks = [])
    {
    }

    // line 29
    public function block_aside($context, array $blocks = [])
    {
        echo " ";
    }

    // line 35
    public function block_fos_user_content($context, array $blocks = [])
    {
    }

    // line 41
    public function block_footer($context, array $blocks = [])
    {
        echo " ";
    }

    // line 47
    public function block_controlSidebar($context, array $blocks = [])
    {
        echo " ";
    }

    // line 54
    public function block_javascripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  175 => 54,  169 => 47,  163 => 41,  158 => 35,  152 => 29,  147 => 21,  142 => 22,  140 => 21,  137 => 20,  134 => 19,  127 => 48,  125 => 47,  118 => 42,  116 => 41,  109 => 36,  107 => 35,  100 => 30,  98 => 29,  91 => 24,  89 => 19,  83 => 15,  80 => 14,  75 => 9,  69 => 6,  62 => 55,  60 => 54,  56 => 52,  54 => 14,  48 => 10,  46 => 9,  40 => 6,  33 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/views/base.html.twig");
    }
}
