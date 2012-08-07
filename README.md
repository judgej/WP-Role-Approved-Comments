WP-Role-Approved-Comments
=========================

WP Plugin. Automatically approve comments for users that are in specified roles.

Plugin Name
===========

Contributors: judgej
Donate link: http://example.com/
Tags: comments, approval, moderation
Requires at least: 2.0.2
Tested up to: 2.8.4
Stable tag: 1.0

This plugin will allow any specified role to have their comments automatically approved.

Description
===========

This plugin was developed to meet a specific need: an organisation had members and non-members logging into
the blogs. The requirement called for members to be able to comment without needing administrator approval.
Non-members needed to get their comments approved before they were displayed.

So long as users are created with the correct role (e.g. "members" and "nonmembers" in this case) this
plugin allows you to add the "Role Approved Comments" capability to any of those roles. If the role a
user is in has that capability, then their comments will automatically be approved.

There is no administration screen for this plugin. You must use the 
[capsman](http://wordpress.org/extend/plugins/capsman/) plugin to manage the capability. The capability
will appear as "Role approved comment".

This plugin does not affect any other rules you have set for approvals. For example, if comments are set
to be auto-approved once a user has already got one approved comment through the system, then their
subsequent comments will be approved regardless of the capability setting.

Installation
============

Just install this plugin, ensure you have the capsman plugin installed, and set the "Role approved comment"
capability for any role that requires automatic approval of all its comments.

Frequently Asked Questions
==========================

Does the capsman plugin need to be installed first?
---------------------------------------------------

No. The capsman module is used to turn the capability on and off, but is not a prerequisite to
installing or using this plugin. Once the capabilities are set, the capsman extension could be
deactivated without any effect on this plugin.

Screenshots
===========

Changelog
=========

= 1.0 =
* First version.

Arbitrary section
=================
