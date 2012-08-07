<?php
/*
Plugin Name: Role Approved Comment
Plugin URI: http://www.consil.co.uk/blog/category/wordpress/
Description: Provide capability to allow comments to be auto-approved for specifid roles.
Version: 1.0
Author: Jason Judge
Author URI: http://www.consil.co.uk/blog/author/judgej/

 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

// In this function we will check a custom capability against the role
// the current user is in. If the role has the capability, then the
// comment will be considered approved.

function role_approved_comment_pre_comment_approved($approved)
{
    // No need to do the check if the comment is already approved anyway.
    if (!$approved) {
        if (current_user_can('role_approved_comment')) {
            // Note: 1/0, not true/false
            $approved = 1;
        }
    }

    return $approved;
}

// Action allows the comment automatic approval to be over-ridden.
add_action('pre_comment_approved', 'role_approved_comment_pre_comment_approved');

// Get this to run just once when the plugin is activated.
function role_approved_comment_add_capabilities()
{
    // Just adding the capability to the administrator role seems to make it
    // available to all roles. This is a hack, so far as I can see, because
    // there is no way to register a capability without assigning it to a
    // role. We have to hope the "administrator" role exists.
    $role = get_role('administrator');
    $role->add_cap('role_approved_comment');
}

// Remove the capability when this plugin is deactivated.
function role_approved_comment_del_capabilities()
{
    // TODO: work out how to remove the capability completely from the system. I suspect there are 
    // no APIs to do this.
    $role = get_role('administrator');
    $role->remove_cap('role_approved_comment');
}

role_approved_comment_del_capabilities();

if (is_admin())
{
    register_activation_hook(basename(dirname(__FILE__)) . '/role-approved-comment.php', 'role_approved_comment_add_capabilities');
    register_deactivation_hook(basename(dirname(__FILE__)) . '/role-approved-comment.php', 'role_approved_comment_del_capabilities');
}

?>