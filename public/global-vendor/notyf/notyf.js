!function () {
    function n(n, t) {
        for (property in t)t.hasOwnProperty(property) && (n[property] = t[property]);
        return n
    }

    function t(n, t) {
        var i = document.createElement("div");
        i.className = "notyf";
        var e = document.createElement("div");
        e.className = "notyf-wrapper";
        var o = document.createElement("div");
        o.className = "notyf-icon";
        var a = document.createElement("i");
        a.className = t;
        var r = document.createElement("div");
        r.className = "notyf-message", r.innerHTML = n, o.appendChild(a), e.appendChild(o), e.appendChild(r), i.appendChild(e);
        var c = this;
        return setTimeout(function () {
            i.className += " disappear", i.addEventListener(c.animationEnd, function (n) {
                n.target == i && c.container.removeChild(i)
            });
            var n = c.notifications.indexOf(i);
            c.notifications.splice(n, 1)
        }, c.options.delay), i
    }

    function i() {
        var n, t = document.createElement("fake"), i = {
            transition: "animationend",
            OTransition: "oAnimationEnd",
            MozTransition: "animationend",
            WebkitTransition: "webkitAnimationEnd"
        };
        for (n in i)if (void 0 !== t.style[n])return i[n]
    }

    this.Notyf = function () {
        this.notifications = [];
        var t = {
            delay: 2e3,
            alertIcon: "notyf-alert-icon",
            confirmIcon: "notyf-confirm-icon"
        };
        arguments[0] && "object" == typeof arguments[0] ? this.options = n(t, arguments[0]) : this.options = t;
        var e = document.createDocumentFragment(), o = document.createElement("div");
        o.className = "notyf-container", e.appendChild(o), document.body.appendChild(e), this.container = o, this.animationEnd = i()
    }, this.Notyf.prototype.error = function (n) {
        var i = t.call(this, n, this.options.alertIcon);
        i.className += " error-notify", this.container.appendChild(i), this.notifications.push(i)
    }, this.Notyf.prototype.success = function (n) {
        var i = t.call(this, n, this.options.confirmIcon);
        i.className += " success-notify", this.container.appendChild(i), this.notifications.push(i)
    }, this.Notyf.prototype.info = function (n) {
        var i = t.call(this, n, this.options.confirmIcon);
        i.className += " info-notify", this.container.appendChild(i), this.notifications.push(i)
    }
}();