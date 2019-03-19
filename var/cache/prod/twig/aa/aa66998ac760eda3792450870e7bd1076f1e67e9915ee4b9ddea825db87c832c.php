<?php

/* @FOSUser/Resetting/request_content.html.twig */
class __TwigTemplate_f394c0e1ccd15fbb341077b26860e5d33081415b195c6aa99f964167ec89c8ed extends Twig_Template
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
        echo "
";
        // line 3
        echo "
<a href=\"\"><img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("templates/dist/img/logo.png"), "html", null, true);
        echo "\" alt=\"logo\" /></a>


<div class=\"box box-info\">
    <div class=\"box-header with-border\">
        <h3 class=\"col-sm-10 box-title\">Récupération mot de passe</h3>
    </div>

    <form action=\"";
        // line 12
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_resetting_send_email");
        echo "\" method=\"POST\" class=\"form-horizontal\">
        <div class=\"box-body\">
            <div class=\"form-group\">
                <label for=\"username\" class=\"col-sm-3 control-label\">";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("resetting.request.username", [], "FOSUserBundle"), "html", null, true);
        echo "</label>
                <div class=\"col-sm-4\">
                    <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" required=\"required\" />
                </div>
            </div>
        </div>
        <div>
            <input type=\"submit\" class=\"  btn btn-info pull-right\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("resetting.request.submit", [], "FOSUserBundle"), "html", null, true);
        echo "\" />
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "@FOSUser/Resetting/request_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 22,  46 => 15,  40 => 12,  29 => 4,  26 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@FOSUser/Resetting/request_content.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/FOSUserBundle/views/Resetting/request_content.html.twig");
    }
}
