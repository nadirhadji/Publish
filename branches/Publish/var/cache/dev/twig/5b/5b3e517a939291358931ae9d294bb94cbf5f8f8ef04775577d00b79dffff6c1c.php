<?php

/* @FOSUser/Resetting/request_content.html.twig */
class __TwigTemplate_5654172269f27b7117c535b4adffbe1800662e8640d83e17091103f5b8c9ccbb extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Resetting/request_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Resetting/request_content.html.twig"));

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
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

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
        return array (  62 => 22,  52 => 15,  46 => 12,  35 => 4,  32 => 3,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% trans_default_domain 'FOSUserBundle' %}

<a href=\"\"><img src=\"{{ asset('templates/dist/img/logo.png') }}\" alt=\"logo\" /></a>


<div class=\"box box-info\">
    <div class=\"box-header with-border\">
        <h3 class=\"col-sm-10 box-title\">Récupération mot de passe</h3>
    </div>

    <form action=\"{{ path('fos_user_resetting_send_email') }}\" method=\"POST\" class=\"form-horizontal\">
        <div class=\"box-body\">
            <div class=\"form-group\">
                <label for=\"username\" class=\"col-sm-3 control-label\">{{ 'resetting.request.username'|trans }}</label>
                <div class=\"col-sm-4\">
                    <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" required=\"required\" />
                </div>
            </div>
        </div>
        <div>
            <input type=\"submit\" class=\"  btn btn-info pull-right\" value=\"{{ 'resetting.request.submit'|trans }}\" />
        </div>
    </form>
</div>
", "@FOSUser/Resetting/request_content.html.twig", "/Applications/MAMP/htdocs/Publish/app/Resources/FOSUserBundle/views/Resetting/request_content.html.twig");
    }
}
