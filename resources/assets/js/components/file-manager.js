 module.exports = {
  template: require('./file-manager.template.html'),

  props: ['params'],

  data: function () {
    return {
      params: {
        currentView: null,
        contentId: null,
        contents: null,
        filename: null
      },
    }
  },

  filters: {
    getFilename: function (value) {
      value = value.split('/')
      length = value.length - 1
      return value[length]
    },
    getFileExt: function (value) {
      value = value.split('/')
      length = value.length - 1
      value = value[length]
      return value.split('.')[1]
    },
  },

  methods: {
    submitFile: function(e) {
      e.preventDefault()
      var files = this.$$.upload.files
      var data = new FormData()
      data.append('file', files[0])
      // post file for upload
      this.$http.post('/admin/api/upload/'+this.params.contentId, data, function (data, status, request) {
        console.log(data)
      }).error(function (data, status, request) {
        console.log(data)
      })
    }
  }
}