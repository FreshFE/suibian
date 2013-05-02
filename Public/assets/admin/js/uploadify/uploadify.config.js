(function(root, $) {

    // 构造函数
    var UploadImg = function(node, swf) {

        // 设置node
        this.$el = $(node);

        // 设置swf地址
        if(swf)
            this.config.swf = swf;
        else
            this.config.swf = "/assets/admin/js/uploadify/uploadify.swf";
    };

    // 方法
    UploadImg.prototype = {

        "debug": false,

        /**
         * 配置
         */
        "config": {
            "swf":              "",
            "uploader":         "",
            "removeTimeout":    3,
            "queueSizeLimit":   20,
            "fileSizeLimit":    "4MB",
            "fileTypeExts":     "*.jpg;*.jpeg;*.png;*gif",
            "buttonText":       "<i class=\"icon-white icon-camera\"></i>添加图片",
            "buttonClass":      "btn btn-danger",
            "width":            70,
            "height":           18,
            "method":           "post",
            "fileObjName":      "uploadify_file",
            "formData":         {},
        },

        /**
         * 将图片上传
         * @param string uploader 上传地址
         * @param object formData 配置选项
         * @return void
         */
        'upload': function(uploader, formData) {

            var self = this;

            // 合并配置
            var config = $.extend(this.config, {
                'onUploadStart' : function(file) {
                    if(self.debug) console.log("onUploadStart", file);
                    self.onUploadStart(file);
                },
                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                    if(self.debug) console.log("onUploadError", file, errorCode, errorMsg, errorString);
                    self.onUploadError(file, errorCode, errorMsg, errorString);
                },
                'onUploadSuccess' : function(file, data, response) {
                    if(self.debug) console.log("onUploadSuccess", file, data, response);
                    self.onUploadSuccess(file, data, response);
                }
            });

            // 是否设置了上传地址
            if(uploader)
                config.uploader = uploader;

            // 设置参数
            if(formData)
                config.formData = formData;

            // 上传
            this.$el.uploadify(this.config);
        },

        //Event

        /**
         * 上传开始的方法
         * param object file 文件信息
         */
        'onUploadStart': function(file) {

        },

        /**
         * 上传错误
         * param object file
         * param string errorCode
         * param string errorMsg
         * param string errorString
         */
        'onUploadError': function(file, errorCode, errorMsg, errorString) {

        },

        /**
         * 上传错误
         * param object file
         * param json data
         * param object response
         */
        'onUploadSuccess': function(file, data, response) {

        }
    };

    // 输出
    root.UploadImg = UploadImg;

})(window, jQuery);
