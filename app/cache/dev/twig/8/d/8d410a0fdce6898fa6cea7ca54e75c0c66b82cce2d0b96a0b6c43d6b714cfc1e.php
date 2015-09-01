<?php

/* JYGRevestimientosBundle:Page:mision.html.twig */
class __TwigTemplate_8d410a0fdce6898fa6cea7ca54e75c0c66b82cce2d0b96a0b6c43d6b714cfc1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:mision.html.twig", 1);
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
        $__internal_1a846304ce2a6665fd6adff9817bf08e647675dcf1ec69146f8803a9a49d2178 = $this->env->getExtension("native_profiler");
        $__internal_1a846304ce2a6665fd6adff9817bf08e647675dcf1ec69146f8803a9a49d2178->enter($__internal_1a846304ce2a6665fd6adff9817bf08e647675dcf1ec69146f8803a9a49d2178_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:mision.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1a846304ce2a6665fd6adff9817bf08e647675dcf1ec69146f8803a9a49d2178->leave($__internal_1a846304ce2a6665fd6adff9817bf08e647675dcf1ec69146f8803a9a49d2178_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_1147544af6131205d72f4fe9be00a845a3fdb7226a45b331b42e7ee0054a9137 = $this->env->getExtension("native_profiler");
        $__internal_1147544af6131205d72f4fe9be00a845a3fdb7226a45b331b42e7ee0054a9137->enter($__internal_1147544af6131205d72f4fe9be00a845a3fdb7226a45b331b42e7ee0054a9137_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Misión";
        
        $__internal_1147544af6131205d72f4fe9be00a845a3fdb7226a45b331b42e7ee0054a9137->leave($__internal_1147544af6131205d72f4fe9be00a845a3fdb7226a45b331b42e7ee0054a9137_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_36f1abca78466c1b22ebbad92e7b1ed1766cadde7d791d7669c8b05050cf8cf6 = $this->env->getExtension("native_profiler");
        $__internal_36f1abca78466c1b22ebbad92e7b1ed1766cadde7d791d7669c8b05050cf8cf6->enter($__internal_36f1abca78466c1b22ebbad92e7b1ed1766cadde7d791d7669c8b05050cf8cf6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_36f1abca78466c1b22ebbad92e7b1ed1766cadde7d791d7669c8b05050cf8cf6->leave($__internal_36f1abca78466c1b22ebbad92e7b1ed1766cadde7d791d7669c8b05050cf8cf6_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:mision.html.twig";
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
