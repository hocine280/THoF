
<div class="row">
    <div class="col-md-12">
        <h3><i class="bi bi-laptop"></i> Session de navigation </h3>
        <h6>Vous pouvez consulter tous les appareils qui se sont connectés à votre profil</h6>
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-12">
        @if (count($this->sessions) > 0)
            <div class="mt-2 space-y-6">

                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                            
                            <div class="ml-3 browser-session-font-size">
                                <div class="text-sm text-gray-600">
                                    <i class="bi bi-laptop" style="font-size:25px;"></i> {{ $session->agent->platform() }} - {{ $session->agent->browser() }} - {{ $session->ip_address }}, 
                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('Connexion actuelle') }}</span>
                                    @else
                                        {{ __('Dernière connexion') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                                <hr>
                            @else

                                <div class="ml-3 browser-session-font-size">
                                    <div class="text-sm text-gray-600">
                                        <i class="bi bi-phone" style="font-size:25px;"></i> {{ $session->agent->platform() }} - {{ $session->agent->browser() }} - {{ $session->ip_address }}, 
                                        @if ($session->is_current_device)
                                            <span class="text-green-500 font-semibold">{{ __('Connexion actuelle') }}</span>
                                        @else
                                            {{ __('Dernière connexion') }} {{ $session->last_active }}
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endif                          
                        </div>
                    </div>
                @endforeach   
            </div>
        @endif
    </div>
</div>
