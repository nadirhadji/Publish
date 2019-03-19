<?php

/* @FOSUser/Security/login.html.twig */
class __TwigTemplate_1a438ff6fd9aa4b1ad1048dae8e0218df8841fe15aac74a7a1a2e308c3f345c4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "@FOSUser/Security/login.html.twig", 1);
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

    // line 3
    public function block_fos_user_content($context, array $blocks = [])
    {
        // line 4
        echo "
        <body class=\"hold-transition login-page\">

        ";
        // line 7
        if (($context["error"] ?? null)) {
            // line 8
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageKey", []), twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageData", []), "security"), "html", null, true);
            echo "</div>
        ";
        }
        // line 10
        echo "
        <div class=\"login-box\">

        <div class=\"login-logo\">
            <a href=\"\"><img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("templates/dist/img/logo.png"), "html", null, true);
        echo "\" alt=\"logo\" /></a>
        </div>
        <!-- /.login-logo -->
        <div class=\"login-box-body\">
        <p class=\"login-box-msg\">Connectez-vous pour commencer votre session</p>

        <form action=\"";
        // line 20
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_security_check");
        echo "\" method=\"post\">

            <div class=\"form-group has-feedback\">
                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" placeholder=\"Adresse Mail\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" required=\"required\" autocomplete=\"username\" />
                <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
            </div>

            <div class=\"form-group has-feedback\">
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" placeholder=\"Mot de passe\" required=\"required\" autocomplete=\"current-password\" />
                <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
            </div>

            <div class=\"row\">
                <div class=\"col-xs-8\">
                    <div class=\"checkbox icheck\">
                        <label>
                            <input type=\"checkbox\"> Se souvenir
                        </label>
                    </div>
                </div>

                <input type=\"hidden\" name=\"_csrf_token\"
                       value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\"
                >

                <!-- /.col -->
                <div class=\"col-xs-4\">
                    <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\">Connection</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

            <div class=\"social-auth-links text-center\">
                <p>- OU -</p>
                ";
        // line 56
        echo "                    ";
        // line 57
        echo "                <a href=\"#\" class=\"btn btn-block btn-social btn-google btn-flat\"><i class=\"fa fa-google-plus\"></i> S'enregistrer avec Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href=\"";
        // line 61
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_resetting_request");
        echo "\">J'ai oublié mon mot de passe</a><br>
            <a href=\"";
        // line 62
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_registration_register");
        echo "\" class=\"text-center\">Enregistrer un nouveau membre</a>

        </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

    ";
    }

    public function getTemplateName()
    {
        return "@FOSUser/Security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 62,  115 => 61,  109 => 57,  107 => 56,  91 => 42,  69 => 23,  63 => 20,  54 => 14,  48 => 10,  42 => 8,  40 => 7,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@FOSUser/Security/login.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/FOSUserBundle/views/Security/login.html.twig");
    }
}
