(function(root, $){

	"use strict";

	var OrderSidebar = function (url) {
		this.url = url;
		this.$el = $('#J_neworder');
	}

	OrderSidebar.prototype = {

		"params": {},

		"send": function () {

			var that = this;

			$.get(
				that.url,
				that.params,
				function(datas) {
					that.onSuceess(datas);
				}
			);
		},

		"onSuceess": function (datas) {
			if(datas !== 'none') {
				// 将请求加入时间戳
				this.params.timestamp = datas.timestamp;
				console.log(this.params.timestamp);

				// 赋值模板
				this.$el.append(datas.temp);
			}
		}
	};

	root.OrderSidebar = OrderSidebar;

})(window, jQuery);