<?php

/* JYGRevestimientosBundle:Page:contacto.html.twig */
class __TwigTemplate_929f77210cb73e17c1828f10af012e0629de76210df1362e7769d946d99245d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:contacto.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JYGRevestimientosBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_aec3c799a5cdb87d1645c014d7fe302b76291a356a61b0aaaef93cf14c7f1b97 = $this->env->getExtension("native_profiler");
        $__internal_aec3c799a5cdb87d1645c014d7fe302b76291a356a61b0aaaef93cf14c7f1b97->enter($__internal_aec3c799a5cdb87d1645c014d7fe302b76291a356a61b0aaaef93cf14c7f1b97_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:contacto.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_aec3c799a5cdb87d1645c014d7fe302b76291a356a61b0aaaef93cf14c7f1b97->leave($__internal_aec3c799a5cdb87d1645c014d7fe302b76291a356a61b0aaaef93cf14c7f1b97_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_ae282d1c06ab9938f0eab72e43e4d4ee6521c040a8579684d27017fa77a892e6 = $this->env->getExtension("native_profiler");
        $__internal_ae282d1c06ab9938f0eab72e43e4d4ee6521c040a8579684d27017fa77a892e6->enter($__internal_ae282d1c06ab9938f0eab72e43e4d4ee6521c040a8579684d27017fa77a892e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Contacto";
        
        $__internal_ae282d1c06ab9938f0eab72e43e4d4ee6521c040a8579684d27017fa77a892e6->leave($__internal_ae282d1c06ab9938f0eab72e43e4d4ee6521c040a8579684d27017fa77a892e6_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_389941be8dbe8cf5cd095d56d986e2198644ee6cd1fc9a7d52881f8e430d7f93 = $this->env->getExtension("native_profiler");
        $__internal_389941be8dbe8cf5cd095d56d986e2198644ee6cd1fc9a7d52881f8e430d7f93->enter($__internal_389941be8dbe8cf5cd095d56d986e2198644ee6cd1fc9a7d52881f8e430d7f93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_389941be8dbe8cf5cd095d56d986e2198644ee6cd1fc9a7d52881f8e430d7f93->leave($__internal_389941be8dbe8cf5cd095d56d986e2198644ee6cd1fc9a7d52881f8e430d7f93_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:contacto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
