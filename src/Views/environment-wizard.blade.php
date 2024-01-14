@extends('installer::layouts.master')

@section('template_title')
    {{ trans('installer_messages.environment.wizard.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-magic fa-fw" aria-hidden="true"></i>
    {!! trans('installer_messages.environment.wizard.title') !!}
@endsection

@section('container')
    <div class="tabs tabs-full">

        <input id="tab1" type="radio" name="tabs" class="tab-input" checked />
        <label for="tab1" class="tab-label">
            <i class="fa fa-check-circle fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installer_messages.environment.wizard.tabs.verify') }}
        </label>

        <input id="tab2" type="radio" name="tabs" class="tab-input" />
        <label for="tab2" class="tab-label">
            <i class="fa fa-cog fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installer_messages.environment.wizard.tabs.environment') }}
        </label>

        <input id="tab3" type="radio" name="tabs" class="tab-input" />
        <label for="tab3" class="tab-label">
            <i class="fa fa-database fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ trans('installer_messages.environment.wizard.tabs.database') }}
        </label>



        <form method="post" action="{{ route('LaravelInstaller::environmentSaveWizard') }}" class="tabs-wrap">
            <div class="tab" id="tab1content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->has('email_id') ? ' has-error ' : '' }}">
                    <label for="email_id">
                        {{ trans('installer_messages.environment.wizard.form.app_tabs.email_for_news') }}
                    </label>
                    <input type="text" name="email_id" id="email_id" value="{{old('email_id')}}" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.email_for_news_placeholder') }}" />
                    @if ($errors->has('email_id'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('email_id') }}
                        </span>
                    @endif
                </div>
                <!-- SUBMIT_NEXT_TAB -->
                <div class="buttons">
                    <button class="button" onclick="showEnvironmentSettings();return false">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_env') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="tab" id="tab2content">

                <!-- APP_NAME -->
                <div class="form-group {{ $errors->has('app_name') ? ' has-error ' : '' }}">
                    <label for="app_name">
                        {{ trans('installer_messages.environment.wizard.form.app_name_label') }}
                    </label>
                    <input type="text" name="app_name" id="app_name" value="{{old('app_name')}}" placeholder="{{ trans('installer_messages.environment.wizard.form.app_name_placeholder') }}" />
                    @if ($errors->has('app_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </span>
                    @endif
                </div>
                <!-- APP_ENVIRONMENT -->
                <div class="form-group {{ $errors->has('environment') ? ' has-error ' : '' }}">
                    <label for="environment">
                        {{ trans('installer_messages.environment.wizard.form.app_environment_label') }}
                    </label>
                    <select name="environment" id="environment" onchange='checkEnvironment(this.value);'>
                        <option value="production" selected>{{ trans('installer_messages.environment.wizard.form.app_environment_label_production') }}</option>
                        <option value="local">{{ trans('installer_messages.environment.wizard.form.app_environment_label_local') }}</option>
                        <option value="development">{{ trans('installer_messages.environment.wizard.form.app_environment_label_developement') }}</option>
                        <option value="qa">{{ trans('installer_messages.environment.wizard.form.app_environment_label_qa') }}</option>
                        <option value="other">{{ trans('installer_messages.environment.wizard.form.app_environment_label_other') }}</option>
                    </select>
                    <div id="environment_text_input" style="display: none;">
                        <input type="text" name="environment_custom" id="environment_custom" placeholder="{{ trans('installer_messages.environment.wizard.form.app_environment_placeholder_other') }}"/>
                    </div>
                    @if ($errors->has('app_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </span>
                    @endif
                </div>
                <!-- APP_DEBUG_HIDDEN -->
                <div class="form-group {{ $errors->has('app_debug') ? ' has-error ' : '' }}">
                    <input type="hidden" name="app_debug" id="app_debug_true" value="false"/>
                    @if ($errors->has('app_debug'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_debug') }}
                        </span>
                    @endif
                </div>
                <!-- APP_LOG_HIDDEN -->
                <div class="form-group {{ $errors->has('app_log_level') ? ' has-error ' : '' }}">

                    <input type="hidden" name="app_log_level" id="app_log_level" value="debug">
                    @if ($errors->has('app_log_level'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_log_level') }}
                        </span>
                    @endif
                </div>
                <!-- APP_URL -->
                <div class="form-group {{ $errors->has('app_url') ? ' has-error ' : '' }}">
                    <label for="app_url">
                        {{ trans('installer_messages.environment.wizard.form.app_url_label') }}
                    </label>
                    <input type="url" name="app_url" id="app_url" value="{{ url('/') }}" placeholder="{{ trans('installer_messages.environment.wizard.form.app_url_placeholder') }}" />
                    @if ($errors->has('app_url'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_url') }}
                        </span>
                    @endif
                </div>
                <div class="buttons">
                    <button class="button" onclick="showDatabaseSettings();return false">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_database') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="tab" id="tab3content">

                <div class="form-group {{ $errors->has('database_connection') ? ' has-error ' : '' }}">
                    <label for="database_connection">
                        {{ trans('installer_messages.environment.wizard.form.db_connection_label') }}
                    </label>
                    <select name="database_connection" id="database_connection">
                        <option value="mysql" selected>{{ trans('installer_messages.environment.wizard.form.db_connection_label_mysql') }}</option>
                        <option value="sqlite">{{ trans('installer_messages.environment.wizard.form.db_connection_label_sqlite') }}</option>
                        <option value="pgsql">{{ trans('installer_messages.environment.wizard.form.db_connection_label_pgsql') }}</option>
                        <option value="sqlsrv">{{ trans('installer_messages.environment.wizard.form.db_connection_label_sqlsrv') }}</option>
                    </select>
                    @if ($errors->has('database_connection'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_connection') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_hostname') ? ' has-error ' : '' }}">
                    <label for="database_hostname">
                        {{ trans('installer_messages.environment.wizard.form.db_host_label') }}
                    </label>
                    <input type="text" name="database_hostname" id="database_hostname" value="127.0.0.1" placeholder="{{ trans('installer_messages.environment.wizard.form.db_host_placeholder') }}" />
                    @if ($errors->has('database_hostname'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_hostname') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_port') ? ' has-error ' : '' }}">
                    <label for="database_port">
                        {{ trans('installer_messages.environment.wizard.form.db_port_label') }}
                    </label>
                    <input type="number" name="database_port" id="database_port" value="3306" placeholder="{{ trans('installer_messages.environment.wizard.form.db_port_placeholder') }}" />
                    @if ($errors->has('database_port'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_port') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_name') ? ' has-error ' : '' }}">
                    <label for="database_name">
                        {{ trans('installer_messages.environment.wizard.form.db_name_label') }}
                    </label>
                    <input type="text" name="database_name" id="database_name" value="{{old('database_name')}}" placeholder="{{ trans('installer_messages.environment.wizard.form.db_name_placeholder') }}" />
                    @if ($errors->has('database_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_username') ? ' has-error ' : '' }}">
                    <label for="database_username">
                        {{ trans('installer_messages.environment.wizard.form.db_username_label') }}
                    </label>
                    <input type="text" name="database_username" id="database_username" value="{{old('database_username')}}" placeholder="{{ trans('installer_messages.environment.wizard.form.db_username_placeholder') }}" />
                    @if ($errors->has('database_username'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_username') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_password') ? ' has-error ' : '' }}">
                    <label for="database_password">
                        {{ trans('installer_messages.environment.wizard.form.db_password_label') }}
                    </label>
                    <input type="password" name="database_password" id="database_password" value="{{old('database_password')}}" placeholder="{{ trans('installer_messages.environment.wizard.form.db_password_placeholder') }}" />
                    @if ($errors->has('database_password'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_password') }}
                        </span>
                    @endif
                </div>


                <!-- NOT_NECESSARILY -->
                <div style="display:none;">
                    <div class="block">
                        <input type="radio" name="appSettingsTabs" id="appSettingsTab1" value="null" checked />
                        <div class="info">
                            <div class="form-group {{ $errors->has('broadcast_driver') ? ' has-error ' : '' }}">
                                <input type="hidden" name="broadcast_driver" id="broadcast_driver" value="log" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.broadcasting_placeholder') }}" />
                                @if ($errors->has('broadcast_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('broadcast_driver') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('cache_driver') ? ' has-error ' : '' }}">
                                <input type="hidden" name="cache_driver" id="cache_driver" value="file" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.cache_placeholder') }}" />
                                @if ($errors->has('cache_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('cache_driver') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('session_driver') ? ' has-error ' : '' }}">
                                <input type="hidden" name="session_driver" id="session_driver" value="file" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.session_placeholder') }}" />
                                @if ($errors->has('session_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('session_driver') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('queue_driver') ? ' has-error ' : '' }}">
                                <input type="hidden" name="queue_driver" id="queue_driver" value="sync" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.queue_placeholder') }}" />
                                @if ($errors->has('queue_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('queue_driver') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <input type="radio" name="appSettingsTabs" id="appSettingsTab2" value="null"/>
                        <div class="info">
                            <div class="form-group {{ $errors->has('redis_hostname') ? ' has-error ' : '' }}">

                                <input type="hidden" name="redis_hostname" id="redis_hostname" value="127.0.0.1" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_host') }}" />
                                @if ($errors->has('redis_hostname'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('redis_hostname') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('redis_password') ? ' has-error ' : '' }}">
                                <input type="hidden" name="redis_password" id="redis_password" value="null" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_password') }}" />
                                @if ($errors->has('redis_password'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('redis_password') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('redis_port') ? ' has-error ' : '' }}">

                                <input type="hidden" name="redis_port" id="redis_port" value="6379" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.redis_port') }}" />
                                @if ($errors->has('redis_port'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('redis_port') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <input type="radio" name="appSettingsTabs" id="appSettingsTab3" value="null"/>

                        <div class="info">
                            <div class="form-group {{ $errors->has('mail_driver') ? ' has-error ' : '' }}">
                                <input type="hidden" name="mail_driver" id="mail_driver" value="smtp" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_driver_placeholder') }}" />
                                @if ($errors->has('mail_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_driver') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                                <input type="hidden" name="mail_host" id="mail_host" value="smtp.mailtrap.io" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_host_placeholder') }}" />
                                @if ($errors->has('mail_host'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_host') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('mail_port') ? ' has-error ' : '' }}">
                                <input type="hidden" name="mail_port" id="mail_port" value="2525" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_port_placeholder') }}" />
                                @if ($errors->has('mail_port'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_port') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('mail_username') ? ' has-error ' : '' }}">
                                <input type="hidden" name="mail_username" id="mail_username" value="null" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_username_placeholder') }}" />
                                @if ($errors->has('mail_username'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_username') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('mail_password') ? ' has-error ' : '' }}">
                                <input type="hidden" name="mail_password" id="mail_password" value="null" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_password_placeholder') }}" />
                                @if ($errors->has('mail_password'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_password') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('mail_encryption') ? ' has-error ' : '' }}">
                                <input type="hidden" name="mail_encryption" id="mail_encryption" value="null" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.mail_encryption_placeholder') }}" />
                                @if ($errors->has('mail_encryption'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_encryption') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="block margin-bottom-2">
                        <input type="radio" name="appSettingsTabs" id="appSettingsTab4" value="null"/>
                        <div class="info">
                            <div class="form-group {{ $errors->has('pusher_app_id') ? ' has-error ' : '' }}">
                                <input type="hidden" name="pusher_app_id" id="pusher_app_id" value="" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_id_palceholder') }}" />
                                @if ($errors->has('pusher_app_id'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('pusher_app_id') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('pusher_app_key') ? ' has-error ' : '' }}">
                                <label for="pusher_app_key">{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_label') }}</label>
                                <input type="text" name="pusher_app_key" id="pusher_app_key" value="" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_palceholder') }}" />
                                @if ($errors->has('pusher_app_key'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('pusher_app_key') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('pusher_app_secret') ? ' has-error ' : '' }}">
                                <label for="pusher_app_secret">{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_label') }}</label>
                                <input type="password" name="pusher_app_secret" id="pusher_app_secret" value="" placeholder="{{ trans('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_palceholder') }}" />
                                @if ($errors->has('pusher_app_secret'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('pusher_app_secret') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <button class="button" type="submit" id="install-software">
                        {{ trans('installer_messages.environment.wizard.form.buttons.install') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection

<script type="text/javascript">
    "use strict";
    function checkEnvironment(val) {
        var element=document.getElementById('environment_text_input');
        if(val=='other') {
            element.style.display='block';
        } else {
            element.style.display='none';
        }
    }
    function showEnvironmentSettings() {
        document.getElementById('tab2').checked = true;
    }
    function showDatabaseSettings() {
        document.getElementById('tab3').checked = true;
    }
    document.addEventListener("DOMContentLoaded", function() {
    var installBtn = document.getElementById("install-software");

    if (installBtn) {
        installBtn.addEventListener("click", function(event) {
            var button = this;
            button.disabled = true;
            button.innerHTML = "Please wait...";
            setTimeout(function() {
              button.closest("form").submit();
            }, 1000);
          });
        }
    });
</script>
