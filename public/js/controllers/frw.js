/**
 * Created by programmist on 18.05.2016.
 */
/**
 * @module prot_forward
 * @class prot_forward
 */
define([ 'jquery', 'knockout', 'config/config', 'service', 'underscore' ],

    function($, ko, config, service, _) {

        var protocolModes = _.map(config.FORWARD_PROTOCOL_MODES, function(item) {
            return new Option(item.name, item.value);
        });

        var columnsTmpl = [
            { columnType:"checkbox", rowText:"index", width:"8%" },
            { headerTextTrans:"ip_address", rowText:"ipAddress", width:"23%" },
            { headerTextTrans:"port_range", rowText:"portRange", width:"23%" },
            { headerTextTrans:"protocol", rowText:"protocol", width:"23%" },
            { headerTextTrans:"comment", rowText:"comment", width:"23%" }
        ];

        /**
         * prot_forward VM
         * @class PortForwardVM
         */
        function PortForwardVM() {
            var self = this;
            var info = getPortForward();

            self.portForwardEnable = ko.observable(info.portForwardEnable);
            self.oriPortForwardEnable = ko.observable(info.portForwardEnable);

            self.ipAddress = ko.observable('');
            self.portStart = ko.observable('');
            self.portEnd = ko.observable('');

            self.modes = ko.observableArray(protocolModes);
            self.selectedMode = ko.observable('3');
            self.comment = ko.observable('');

            self.rules = ko.observableArray(info.portForwardRules);

            self.gridTemplate = new ko.simpleGrid.viewModel({
                data:self.rules(),
                idName:"index",
                columns:columnsTmpl,
                tmplType:'list',
                pageSize: 10
            });

            /**
             * ?�??�?,?��???,?? ?��?�??�??�??��
             * @method callback
             */
            self.callback = function(result) {
                if (result.result == "success") {
                    clear();
                    init(self);
                    successOverlay();
                } else {
                    errorOverlay();
                }
            };

            /**
             * ??�?��?��?? ?��??�??�?�?
             * @method clear
             */
            function clear() {
                self.ipAddress('');
                self.portStart('');
                self.portEnd('');
                self.selectedMode('TCP&UDP');
                self.comment('');
            }

            /**
             * ?�??�??�??�????????�?
             * @method enableVirtualServer
             */
            self.enableVirtualServer = function() {
                showLoading('operating');
                var params = {};
                params.portForwardEnable = self.portForwardEnable();
                service.enableVirtualServer(params, self.callback);
            };

            /**
             * ????�??��??�
             * @method save
             */
            self.save = function() {
                if(self.rules().length >= config.portForwardMax) {
                    showAlert({msg: "rules_max", params: config.portForwardMax});
                    return;
                }

                if(self.checkExist()) {
                    showAlert("rule_exist");
                    return;
                }

                showLoading('operating');
                var params = {};
                params.ipAddress = self.ipAddress();
                params.portStart = self.portStart();
                params.portEnd = self.portEnd();
                params.protocol = self.selectedMode();
                params.comment = self.comment();
                service.setPortForward(params, self.callback);
            };

            /**
             * ??�????��????��??�?????�?�??�??�????
             * @method checkExist
             */
            self.checkExist = function() {
                var newRule = {
                    ipAddress: self.ipAddress(),
                    portRange: self.portStart() + ' - ' + self.portEnd(),
                    protocol: transProtocolValue(self.selectedMode()),
                    comment: self.comment()
                };

                var oldRule;
                var rules = self.rules();
                for(var i = 0; i < rules.length; i++) {
                    oldRule = {
                        ipAddress: rules[i].ipAddress,
                        portRange: rules[i].portRange,
                        protocol: rules[i].protocol,
                        comment: rules[i].comment
                    };

                    if(_.isEqual(newRule, oldRule)) {
                        return true;
                    }
                }
                return false;
            };

            /**
             * ?? ?��?��??�
             * @method deleteForwardRules
             */
            self.deleteForwardRules = function() {
                var ids = self.gridTemplate.selectedIds();
                if(ids.length == 0) {
                    showAlert("no_data_selected");
                    return;
                }

                showConfirm("confirm_data_delete", function () {
                    showLoading('deleting');
                    var params = {};
                    params.indexs = ids;
                    service.deleteForwardRules(params, self.callback);
                });
            };
        }

        /**
         * ??�??�port forward??????
         * @method getPortForward
         */
        function getPortForward() {
            return service.getPortForward();
        }


        /**
         * ????��??�port forward view model
         * @method init
         */
        function init(viewModel) {
            $("#dropdownMain").show();
            $("#dropdownMainForGuest").hide();
            var vm;
            if(viewModel) {
                vm = viewModel;
                var info = getPortForward();
                vm.portForwardEnable(info.portForwardEnable);
                vm.oriPortForwardEnable(info.portForwardEnable);
                vm.rules(info.portForwardRules);
                vm.gridTemplate.data(info.portForwardRules);
                refreshTableHeight();
                return;
            }

            vm = new PortForwardVM();
            var container = $('#container');
            ko.cleanNode(container[0]);
            ko.applyBindings(vm, container[0]);

            fixTableHeight();
            renderCheckbox();

            $('#virtualServerForm').validate({
                submitHandler : function() {
                    vm.enableVirtualServer();
                }
            });

            $('#portForwardListForm').validate({
                submitHandler : function() {
                    vm.deleteForwardRules();
                }
            });

            $('#portForwardForm').validate({
                submitHandler : function() {
                    vm.save();
                },
                rules: {
                    txtIpAddress: {
                        ip_check: true
                    },
                    txtPortStart: {
                        digits: true,
                        range_except: [1, 65000],
                        portCompare: "#txtPortEnd"
                    },
                    txtPortEnd: {
                        digits: true,
                        range_except: [1, 65000],
                        portCompare: "#txtPortStart"
                    },
                    txtComment: {
                        comment_check: true
                    }
                },
                groups: {
                    range: "txtPortStart txtPortEnd"
                },
                errorPlacement: function(error, element) {
                    if(element.attr("name") == "txtIpAddress") {
                        error.insertAfter("#ipExamLabel");
                    }
                    else if(element.attr("name") == "txtPortStart" || element.attr("name") == "txtPortEnd") {
                        error.insertAfter("#rangeLabel");
                    }
                    else
                        error.insertAfter(element);
                }
            });
        }

        return {
            init : init
        };
    });