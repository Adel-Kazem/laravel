<?php

namespace App\Traits;

use App\Models\User;
use ProtoneMedia\Splade\Facades\Toast;

trait HandlesRedirectWithToast
{
    public function showToastAndRedirectBack($title = null, $message = null, $type = null, $autoDismiss = 10)
    {
        if ($type === 'Error' || $type === 'error') {
            $type = 'danger';
        }

        $toast = Toast::rightTop();

        if (!empty($title)) {
            $toast->title($title);
        }

        if (!empty($message)) {
            $toast->message($message);
        }

        if (!empty($type)) {
            $toast->{$type}();
        }

        if ($autoDismiss > 0) {
            $toast->autoDismiss($autoDismiss);
        }

        return redirect()->back();
    }

    public function getTrialLink($text, $allowDismiss = true)
    {
        $trialLink = route('subscription.manage', ['scrollToSection' => 'subscriptionOptions']);
        $dismissAction = $allowDismiss ? "@click='toast.setShow(false)'" : "";
        return "<Link href='{$trialLink}' {$dismissAction} class='underline text-blue-600 hover:text-blue-800'>{$text}</Link>";
    }

    public function createSpladeLink($url, $text, $allowDismiss = true)
    {
        $dismissAction = $allowDismiss ? "@click='toast.setShow(false)'" : "";
        return " <Link {$dismissAction} href='{$url}' class='underline text-blue-600 hover:text-blue-800'>{$text}</Link>";
    }

    public function createLink($routeName, $text, $scrollToSection = null, $allowDismiss = true)
    {
        if ($scrollToSection) {
            $url = route($routeName, ['scrollToSection' => $scrollToSection]);
        } else {
            $url = route($routeName);
        }

        $dismissAction = $allowDismiss ? "@click='toast.setShow(false)'" : "";
        return "<Link href='{$url}' {$dismissAction} class='underline text-blue-600 hover:text-blue-800'>{$text}</Link>";
    }

    public function prepareSubscriptionMessage(User $user, $featureName = 'this feature', $allowDismiss = true)
    {
        // User has already used their trial
        if ($user->hasUsedTrial()) {
            $upgradeLink = $this->getTrialLink('upgrade now', $allowDismiss);
            return "To access {$featureName}, please {$upgradeLink}. Your trial period has ended.";
        }

        // User hasn't tried the trial yet
        $trialLink = $this->getTrialLink('start your free trial', $allowDismiss);
        return "Try {$featureName} and all premium features with your {$trialLink}!";
    }

    public function showSubscriptionRequiredToastAndRedirect(User $user, $featureName = 'this feature', $allowDismiss = true)
    {
//        if ($user->getEffectivePlan() !== 'free') {
//            return null;
//        }

        $message = $this->prepareSubscriptionMessage($user, $featureName, $allowDismiss);

        return $this->showToastAndRedirectBack(
            'Subscription Required',
            $message,
            'warning'
        );
    }

    public function showToast($title, $message, $type, $autoDismiss = 3, $backdrop = false)
    {
        if ($type === 'Error' || $type === 'error') {
            $type = 'danger';
        }

        $toast = Toast::title($title)
            ->message($message)
            ->$type()
            ->rightTop();

        if ($autoDismiss > 0) {
            $toast->autoDismiss($autoDismiss);
        }

        if ($backdrop) {
            $toast->backdrop();
        }

        return $toast;
    }

    public function redirectToPreviousUrl()
    {
        // Get the previous URL
        $previousUrl = url()->previous();

        // Replace 'https' with 'http' to force the URL to use HTTP
        $httpUrl = preg_replace("/^https:/i", "http:", $previousUrl);

        // Redirect to the modified URL
        return redirect($httpUrl);
    }

    public function showToastAndRedirectToRoute($routeName, $routeParams = [], $title = null, $message = null, $type = 'success', $autoDismiss = 10)
    {
        if ($type === 'Error' || $type === 'error') {
            $type = 'danger';
        }

        $toast = Toast::rightTop();

        if (!empty($title)) {
            $toast->title($title);
        }

        if (!empty($message)) {
            $toast->message($message);
        }

        if (!empty($type)) {
            $toast->{$type}();
        }

        if (!empty($autoDismiss)) {
            $toast->autoDismiss($autoDismiss);
        }

        return redirect()->route($routeName, $routeParams);
    }
}
